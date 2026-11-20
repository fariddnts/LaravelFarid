<?php

namespace Tests\Feature;

use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class PelangganIndexTest extends TestCase
{
    public function test_old_dashboard_entry_point_redirects_to_customer_management(): void
    {
        $this->get('/dashboard')->assertRedirect(route('pelanggan.index'));
    }

    public function test_user_sidebar_page_is_restored_with_customer_links(): void
    {
        $this->get('/user')
            ->assertOk()
            ->assertSee('User')
            ->assertSee(route('pelanggan.index'), false)
            ->assertSee(route('pelanggan.create'), false)
            ->assertDontSee('Mahasiswa');
    }

    public function test_create_page_uses_the_same_sidebar_links(): void
    {
        $this->get(route('pelanggan.create'))
            ->assertOk()
            ->assertSee(route('user'), false)
            ->assertSee(route('pelanggan.index'), false)
            ->assertSee(route('pelanggan.create'), false);
    }

    public function test_unrelated_pages_are_no_longer_available(): void
    {
        foreach (['/mahasiswa', '/matakuliah', '/about', '/home'] as $path) {
            $this->get($path)->assertNotFound();
        }
    }

    public function test_customer_index_renders_with_shared_navigation_when_empty(): void
    {
        $html = view('admin.pelanggan.index', [
            'dataPelanggan' => new LengthAwarePaginator([], 0, 10),
        ])->render();

        $this->assertStringContainsString('Data Pelanggan', $html);
        $this->assertStringContainsString('Belum ada data pelanggan.', $html);
        $this->assertStringContainsString(route('user'), $html);
        $this->assertStringContainsString(route('pelanggan.create'), $html);
        $this->assertStringNotContainsString('mahasiswa', strtolower($html));
        $this->assertStringNotContainsString('/dashboard', $html);
    }
}
