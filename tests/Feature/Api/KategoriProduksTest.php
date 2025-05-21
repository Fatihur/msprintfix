<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KategoriProduksTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_kategori_produks(): void
    {
        $kategori = Kategori::factory()->create();
        $produks = Produk::factory()
            ->count(2)
            ->create([
                'kategori_id' => $kategori->id,
            ]);

        $response = $this->getJson(
            route('api.kategoris.produks.index', $kategori)
        );

        $response->assertOk()->assertSee($produks[0]->judul);
    }

    /**
     * @test
     */
    public function it_stores_the_kategori_produks(): void
    {
        $kategori = Kategori::factory()->create();
        $data = Produk::factory()
            ->make([
                'kategori_id' => $kategori->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.kategoris.produks.store', $kategori),
            $data
        );

        $this->assertDatabaseHas('produks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $produk = Produk::latest('id')->first();

        $this->assertEquals($kategori->id, $produk->kategori_id);
    }
}
