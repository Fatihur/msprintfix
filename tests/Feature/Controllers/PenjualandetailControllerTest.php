<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Penjualandetail;

use App\Models\Produk;
use App\Models\Penjualan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenjualandetailControllerTest extends TestCase
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
    public function it_displays_index_view_with_penjualandetails(): void
    {
        $penjualandetails = Penjualandetail::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('penjualandetails.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.penjualandetails.index')
            ->assertViewHas('penjualandetails');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_penjualandetail(): void
    {
        $response = $this->get(route('penjualandetails.create'));

        $response->assertOk()->assertViewIs('app.penjualandetails.create');
    }

    /**
     * @test
     */
    public function it_stores_the_penjualandetail(): void
    {
        $data = Penjualandetail::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('penjualandetails.store'), $data);

        $this->assertDatabaseHas('penjualandetails', $data);

        $penjualandetail = Penjualandetail::latest('id')->first();

        $response->assertRedirect(
            route('penjualandetails.edit', $penjualandetail)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_penjualandetail(): void
    {
        $penjualandetail = Penjualandetail::factory()->create();

        $response = $this->get(
            route('penjualandetails.show', $penjualandetail)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.penjualandetails.show')
            ->assertViewHas('penjualandetail');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_penjualandetail(): void
    {
        $penjualandetail = Penjualandetail::factory()->create();

        $response = $this->get(
            route('penjualandetails.edit', $penjualandetail)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.penjualandetails.edit')
            ->assertViewHas('penjualandetail');
    }

    /**
     * @test
     */
    public function it_updates_the_penjualandetail(): void
    {
        $penjualandetail = Penjualandetail::factory()->create();

        $penjualan = Penjualan::factory()->create();
        $produk = Produk::factory()->create();

        $data = [
            'penjualan_id' => $this->faker->randomNumber(),
            'produk_id' => $this->faker->randomNumber(),
            'jumlah' => $this->faker->randomNumber(1),
            'total' => $this->faker->randomFloat(2, 0, 9999),
            'penjualan_id' => $penjualan->id,
            'produk_id' => $produk->id,
        ];

        $response = $this->put(
            route('penjualandetails.update', $penjualandetail),
            $data
        );

        $data['id'] = $penjualandetail->id;

        $this->assertDatabaseHas('penjualandetails', $data);

        $response->assertRedirect(
            route('penjualandetails.edit', $penjualandetail)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_penjualandetail(): void
    {
        $penjualandetail = Penjualandetail::factory()->create();

        $response = $this->delete(
            route('penjualandetails.destroy', $penjualandetail)
        );

        $response->assertRedirect(route('penjualandetails.index'));

        $this->assertModelMissing($penjualandetail);
    }
}
