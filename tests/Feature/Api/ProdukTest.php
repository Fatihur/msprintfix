<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Produk;

use App\Models\Kategori;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdukTest extends TestCase
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
    public function it_gets_produks_list(): void
    {
        $produks = Produk::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.produks.index'));

        $response->assertOk()->assertSee($produks[0]->judul);
    }

    /**
     * @test
     */
    public function it_stores_the_produk(): void
    {
        $data = Produk::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.produks.store'), $data);

        $this->assertDatabaseHas('produks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_produk(): void
    {
        $produk = Produk::factory()->create();

        $kategori = Kategori::factory()->create();

        $data = [
            'judul' => $this->faker->text(255),
            'kategori_id' => $this->faker->randomNumber(),
            'deskripsi' => $this->faker->text(255),
            'gambar' => $this->faker->text(255),
            'harga' => $this->faker->randomNumber(0),
            'stok' => $this->faker->randomNumber(0),
            'kategori_id' => $kategori->id,
        ];

        $response = $this->putJson(route('api.produks.update', $produk), $data);

        $data['id'] = $produk->id;

        $this->assertDatabaseHas('produks', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_produk(): void
    {
        $produk = Produk::factory()->create();

        $response = $this->deleteJson(route('api.produks.destroy', $produk));

        $this->assertModelMissing($produk);

        $response->assertNoContent();
    }
}
