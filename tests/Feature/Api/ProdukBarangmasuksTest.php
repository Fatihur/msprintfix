<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Produk;
use App\Models\Barangmasuk;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdukBarangmasuksTest extends TestCase
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
    public function it_gets_produk_barangmasuks(): void
    {
        $produk = Produk::factory()->create();
        $barangmasuks = Barangmasuk::factory()
            ->count(2)
            ->create([
                'produk_id' => $produk->id,
            ]);

        $response = $this->getJson(
            route('api.produks.barangmasuks.index', $produk)
        );

        $response->assertOk()->assertSee($barangmasuks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_produk_barangmasuks(): void
    {
        $produk = Produk::factory()->create();
        $data = Barangmasuk::factory()
            ->make([
                'produk_id' => $produk->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.produks.barangmasuks.store', $produk),
            $data
        );

        $this->assertDatabaseHas('barangmasuks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $barangmasuk = Barangmasuk::latest('id')->first();

        $this->assertEquals($produk->id, $barangmasuk->produk_id);
    }
}
