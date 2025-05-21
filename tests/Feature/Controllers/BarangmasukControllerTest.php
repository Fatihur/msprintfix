<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Barangmasuk;

use App\Models\Produk;
use App\Models\Supplier;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangmasukControllerTest extends TestCase
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
    public function it_displays_index_view_with_barangmasuks(): void
    {
        $barangmasuks = Barangmasuk::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('barangmasuks.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.barangmasuks.index')
            ->assertViewHas('barangmasuks');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_barangmasuk(): void
    {
        $response = $this->get(route('barangmasuks.create'));

        $response->assertOk()->assertViewIs('app.barangmasuks.create');
    }

    /**
     * @test
     */
    public function it_stores_the_barangmasuk(): void
    {
        $data = Barangmasuk::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('barangmasuks.store'), $data);

        $this->assertDatabaseHas('barangmasuks', $data);

        $barangmasuk = Barangmasuk::latest('id')->first();

        $response->assertRedirect(route('barangmasuks.edit', $barangmasuk));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_barangmasuk(): void
    {
        $barangmasuk = Barangmasuk::factory()->create();

        $response = $this->get(route('barangmasuks.show', $barangmasuk));

        $response
            ->assertOk()
            ->assertViewIs('app.barangmasuks.show')
            ->assertViewHas('barangmasuk');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_barangmasuk(): void
    {
        $barangmasuk = Barangmasuk::factory()->create();

        $response = $this->get(route('barangmasuks.edit', $barangmasuk));

        $response
            ->assertOk()
            ->assertViewIs('app.barangmasuks.edit')
            ->assertViewHas('barangmasuk');
    }

    /**
     * @test
     */
    public function it_updates_the_barangmasuk(): void
    {
        $barangmasuk = Barangmasuk::factory()->create();

        $produk = Produk::factory()->create();
        $supplier = Supplier::factory()->create();

        $data = [
            'produk_id' => $this->faker->randomNumber(),
            'supplier_id' => $this->faker->randomNumber(),
            'jumlah' => $this->faker->randomNumber(0),
            'harga_beli' => $this->faker->randomNumber(0),
            'produk_id' => $produk->id,
            'supplier_id' => $supplier->id,
        ];

        $response = $this->put(
            route('barangmasuks.update', $barangmasuk),
            $data
        );

        $data['id'] = $barangmasuk->id;

        $this->assertDatabaseHas('barangmasuks', $data);

        $response->assertRedirect(route('barangmasuks.edit', $barangmasuk));
    }

    /**
     * @test
     */
    public function it_deletes_the_barangmasuk(): void
    {
        $barangmasuk = Barangmasuk::factory()->create();

        $response = $this->delete(route('barangmasuks.destroy', $barangmasuk));

        $response->assertRedirect(route('barangmasuks.index'));

        $this->assertModelMissing($barangmasuk);
    }
}
