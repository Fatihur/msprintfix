<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Barangmasuk;

use App\Models\Produk;
use App\Models\Supplier;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangmasukTest extends TestCase
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
    public function it_gets_barangmasuks_list(): void
    {
        $barangmasuks = Barangmasuk::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.barangmasuks.index'));

        $response->assertOk()->assertSee($barangmasuks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_barangmasuk(): void
    {
        $data = Barangmasuk::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.barangmasuks.store'), $data);

        $this->assertDatabaseHas('barangmasuks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.barangmasuks.update', $barangmasuk),
            $data
        );

        $data['id'] = $barangmasuk->id;

        $this->assertDatabaseHas('barangmasuks', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_barangmasuk(): void
    {
        $barangmasuk = Barangmasuk::factory()->create();

        $response = $this->deleteJson(
            route('api.barangmasuks.destroy', $barangmasuk)
        );

        $this->assertModelMissing($barangmasuk);

        $response->assertNoContent();
    }
}
