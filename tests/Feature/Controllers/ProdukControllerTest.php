<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Produk;

use App\Models\Kategori;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdukControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_produks(): void
    {
        $produks = Produk::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('produks.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.produks.index')
            ->assertViewHas('produks');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_produk(): void
    {
        $response = $this->get(route('produks.create'));

        $response->assertOk()->assertViewIs('app.produks.create');
    }

    /**
     * @test
     */
    public function it_stores_the_produk(): void
    {
        $data = Produk::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('produks.store'), $data);

        $this->assertDatabaseHas('produks', $data);

        $produk = Produk::latest('id')->first();

        $response->assertRedirect(route('produks.edit', $produk));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_produk(): void
    {
        $produk = Produk::factory()->create();

        $response = $this->get(route('produks.show', $produk));

        $response
            ->assertOk()
            ->assertViewIs('app.produks.show')
            ->assertViewHas('produk');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_produk(): void
    {
        $produk = Produk::factory()->create();

        $response = $this->get(route('produks.edit', $produk));

        $response
            ->assertOk()
            ->assertViewIs('app.produks.edit')
            ->assertViewHas('produk');
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

        $response = $this->put(route('produks.update', $produk), $data);

        $data['id'] = $produk->id;

        $this->assertDatabaseHas('produks', $data);

        $response->assertRedirect(route('produks.edit', $produk));
    }

    /**
     * @test
     */
    public function it_deletes_the_produk(): void
    {
        $produk = Produk::factory()->create();

        $response = $this->delete(route('produks.destroy', $produk));

        $response->assertRedirect(route('produks.index'));

        $this->assertModelMissing($produk);
    }
}
