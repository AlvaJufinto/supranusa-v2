<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    protected function actingAsAdmin(): static
    {
        $admin = Admin::factory()->create();
        return $this->actingAs($admin, 'admin');
    }

    public function test_admin_login_page_loads(): void
    {
        $response = $this->get(route('admin.login'));

        $response->assertStatus(200);
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $admin = Admin::factory()->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('admin.login.submit'), [
            'email' => 'admin@test.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->post(route('admin.login.submit'), [
            'email' => 'wrong@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_dashboard_loads_with_auth(): void
    {
        $response = $this->actingAsAdmin()->get(route('admin.dashboard'));

        $response->assertStatus(200);
    }

    public function test_admin_dashboard_shows_counts(): void
    {
        Brand::factory()->count(2)->create();
        Product::factory()->count(3)->create();
        Project::factory()->count(1)->create();
        Article::factory()->count(4)->create();

        $response = $this->actingAsAdmin()->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('2');
        $response->assertSee('3');
    }

    public function test_admin_brands_list_loads(): void
    {
        Brand::factory()->count(3)->create();

        $response = $this->actingAsAdmin()->get(route('admin.brands.index'));

        $response->assertStatus(200);
    }

    public function test_admin_brands_create_page_loads(): void
    {
        $response = $this->actingAsAdmin()->get(route('admin.brands.create'));

        $response->assertStatus(200);
    }

    public function test_admin_can_create_brand(): void
    {
        $response = $this->actingAsAdmin()->post(route('admin.brands.store'), [
            'name' => 'Test Brand',
            'description' => 'Test Description',
            'order' => 1,
        ]);

        $response->assertRedirect(route('admin.brands.index'));
        $this->assertDatabaseHas('brands', ['name' => 'Test Brand']);
    }

    public function test_admin_can_view_brand(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->actingAsAdmin()->get(route('admin.brands.show', $brand));

        $response->assertStatus(200);
        $response->assertSee($brand->name);
    }

    public function test_admin_can_edit_brand(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->actingAsAdmin()->get(route('admin.brands.edit', $brand));

        $response->assertStatus(200);
    }

    public function test_admin_can_update_brand(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->actingAsAdmin()->put(route('admin.brands.update', $brand), [
            'name' => 'Updated Brand',
            'description' => 'Updated Description',
        ]);

        $response->assertRedirect(route('admin.brands.index'));
        $this->assertDatabaseHas('brands', ['name' => 'Updated Brand']);
    }

    public function test_admin_can_delete_brand(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->actingAsAdmin()->delete(route('admin.brands.destroy', $brand));

        $response->assertRedirect(route('admin.brands.index'));
        $this->assertDatabaseMissing('brands', ['id' => $brand->id]);
    }

    public function test_admin_products_list_loads(): void
    {
        $brand = Brand::factory()->create();
        Product::factory()->count(3)->create(['brand_id' => $brand->id]);

        $response = $this->actingAsAdmin()->get(route('admin.products.index'));

        $response->assertStatus(200);
    }

    public function test_admin_products_create_page_loads(): void
    {
        Brand::factory()->create();

        $response = $this->actingAsAdmin()->get(route('admin.products.create'));

        $response->assertStatus(200);
    }

    public function test_admin_can_create_product(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->actingAsAdmin()->post(route('admin.products.store'), [
            'brand_id' => $brand->id,
            'name' => 'Test Product',
            'short_description' => 'Short desc',
            'description' => 'Full desc',
            'status' => 'active',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }

    public function test_admin_product_requires_brand(): void
    {
        $response = $this->actingAsAdmin()->post(route('admin.products.store'), [
            'name' => 'Test Product',
            'status' => 'active',
        ]);

        $response->assertSessionHasErrors(['brand_id']);
    }

    public function test_admin_can_view_product(): void
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create(['brand_id' => $brand->id]);

        $response = $this->actingAsAdmin()->get(route('admin.products.show', $product));

        $response->assertStatus(200);
    }

    public function test_admin_can_update_product(): void
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create(['brand_id' => $brand->id]);

        $response = $this->actingAsAdmin()->put(route('admin.products.update', $product), [
            'brand_id' => $brand->id,
            'name' => 'Updated Product',
            'status' => 'active',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', ['name' => 'Updated Product']);
    }

    public function test_admin_can_delete_product(): void
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create(['brand_id' => $brand->id]);

        $response = $this->actingAsAdmin()->delete(route('admin.products.destroy', $product));

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_admin_articles_list_loads(): void
    {
        Article::factory()->count(3)->create();

        $response = $this->actingAsAdmin()->get(route('admin.articles.index'));

        $response->assertStatus(200);
    }

    public function test_admin_articles_create_page_loads(): void
    {
        $response = $this->actingAsAdmin()->get(route('admin.articles.create'));

        $response->assertStatus(200);
    }

    public function test_admin_can_create_article(): void
    {
        $response = $this->actingAsAdmin()->post(route('admin.articles.store'), [
            'title' => 'Test Article',
            'excerpt' => 'Test excerpt',
            'content' => 'Test content',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', ['title' => 'Test Article']);
    }

    public function test_admin_can_update_article(): void
    {
        $article = Article::factory()->create();

        $response = $this->actingAsAdmin()->put(route('admin.articles.update', $article), [
            'title' => 'Updated Article',
            'status' => 'draft',
        ]);

        $response->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', ['title' => 'Updated Article']);
    }

    public function test_admin_can_delete_article(): void
    {
        $article = Article::factory()->create();

        $response = $this->actingAsAdmin()->delete(route('admin.articles.destroy', $article));

        $response->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    public function test_admin_projects_list_loads(): void
    {
        $brand = Brand::factory()->create();
        Project::factory()->count(3)->create(['brand_id' => $brand->id]);

        $response = $this->actingAsAdmin()->get(route('admin.projects.index'));

        $response->assertStatus(200);
    }

    public function test_admin_projects_create_page_loads(): void
    {
        Brand::factory()->create();

        $response = $this->actingAsAdmin()->get(route('admin.projects.create'));

        $response->assertStatus(200);
    }

    public function test_admin_can_create_project(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->actingAsAdmin()->post(route('admin.projects.store'), [
            'brand_id' => $brand->id,
            'title' => 'Test Project',
            'brand' => 'TestBrand',
            'status' => 'published',
        ]);

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', ['title' => 'Test Project']);
    }

    public function test_admin_can_update_project(): void
    {
        $brand = Brand::factory()->create();
        $project = Project::factory()->create(['brand_id' => $brand->id]);

        $response = $this->actingAsAdmin()->put(route('admin.projects.update', $project), [
            'brand_id' => $brand->id,
            'title' => 'Updated Project',
            'brand' => 'UpdatedBrand',
            'status' => 'published',
        ]);

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', ['title' => 'Updated Project']);
    }

    public function test_admin_can_delete_project(): void
    {
        $brand = Brand::factory()->create();
        $project = Project::factory()->create(['brand_id' => $brand->id]);

        $response = $this->actingAsAdmin()->delete(route('admin.projects.destroy', $project));

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_admin_contacts_list_loads(): void
    {
        Contact::factory()->count(3)->create();

        $response = $this->actingAsAdmin()->get(route('admin.contacts.index'));

        $response->assertStatus(200);
    }

    public function test_admin_can_view_contact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->actingAsAdmin()->get(route('admin.contacts.show', $contact));

        $response->assertStatus(200);
        $response->assertSee($contact->name);
    }

    public function test_admin_settings_page_loads(): void
    {
        $response = $this->actingAsAdmin()->get(route('admin.settings.index'));

        $response->assertStatus(200);
    }

    public function test_admin_can_update_settings(): void
    {
        Setting::factory()->create(['key' => 'site_name', 'value' => 'Old Name']);

        $response = $this->actingAsAdmin()->put(route('admin.settings.update'), [
            'site_name' => 'New Name',
        ]);

        $response->assertRedirect(route('admin.settings.index'));
        $this->assertEquals('New Name', Setting::get('site_name'));
    }

    public function test_admin_password_page_loads(): void
    {
        $response = $this->actingAsAdmin()->get(route('admin.password'));

        $response->assertStatus(200);
    }

    public function test_admin_can_logout(): void
    {
        $response = $this->actingAsAdmin()->post(route('admin.logout'));

        $response->assertRedirect('/');
    }
}
