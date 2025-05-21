<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Penjualan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenjualanControllerTest extends TestCase
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
    public function it_displays_index_view_with_penjualans(): void
    {
        $penjualans = Penjualan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('penjualans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.penjualans.index')
            ->assertViewHas('penjualans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_penjualan(): void
    {
        $response = $this->get(route('penjualans.create'));

        $response->assertOk()->assertViewIs('app.penjualans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_penjualan(): void
    {
        $data = Penjualan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('penjualans.store'), $data);

        $this->assertDatabaseHas('penjualans', $data);

        $penjualan = Penjualan::latest('id')->first();

        $response->assertRedirect(route('penjualans.edit', $penjualan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_penjualan(): void
    {
        $penjualan = Penjualan::factory()->create();

        $response = $this->get(route('penjualans.show', $penjualan));

        $response
            ->assertOk()
            ->assertViewIs('app.penjualans.show')
            ->assertViewHas('penjualan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_penjualan(): void
    {
        $penjualan = Penjualan::factory()->create();

        $response = $this->get(route('penjualans.edit', $penjualan));

        $response
            ->assertOk()
            ->assertViewIs('app.penjualans.edit')
            ->assertViewHas('penjualan');
    }

    /**
     * @test
     */
    public function it_updates_the_penjualan(): void
    {
        $penjualan = Penjualan::factory()->create();

        $data = [
            'tanggal' => $this->faker->date(),
            'konsumen' => $this->faker->text(255),
        ];

        $response = $this->put(route('penjualans.update', $penjualan), $data);

        $data['id'] = $penjualan->id;

        $this->assertDatabaseHas('penjualans', $data);

        $response->assertRedirect(route('penjualans.edit', $penjualan));
    }

    /**
     * @test
     */
    public function it_deletes_the_penjualan(): void
    {
        $penjualan = Penjualan::factory()->create();

        $response = $this->delete(route('penjualans.destroy', $penjualan));

        $response->assertRedirect(route('penjualans.index'));

        $this->assertModelMissing($penjualan);
    }
}
