<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Barangmasuk;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupplierBarangmasuksTest extends TestCase
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
    public function it_gets_supplier_barangmasuks(): void
    {
        $supplier = Supplier::factory()->create();
        $barangmasuks = Barangmasuk::factory()
            ->count(2)
            ->create([
                'supplier_id' => $supplier->id,
            ]);

        $response = $this->getJson(
            route('api.suppliers.barangmasuks.index', $supplier)
        );

        $response->assertOk()->assertSee($barangmasuks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_supplier_barangmasuks(): void
    {
        $supplier = Supplier::factory()->create();
        $data = Barangmasuk::factory()
            ->make([
                'supplier_id' => $supplier->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.suppliers.barangmasuks.store', $supplier),
            $data
        );

        $this->assertDatabaseHas('barangmasuks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $barangmasuk = Barangmasuk::latest('id')->first();

        $this->assertEquals($supplier->id, $barangmasuk->supplier_id);
    }
}
