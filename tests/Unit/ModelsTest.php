<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Media;
use App\Models\Product;
use App\Models\Project;
use App\Models\Setting;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created(): void
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }

    public function test_user_has_password_hidden(): void
    {
        $user = User::factory()->create();
        $array = $user->toArray();
        $this->assertArrayNotHasKey('password', $array);
    }

    public function test_admin_can_be_created(): void
    {
        $admin = Admin::factory()->create();
        $this->assertDatabaseHas('admins', ['email' => $admin->email]);
    }

    public function test_admin_has_password_hidden(): void
    {
        $admin = Admin::factory()->create();
        $array = $admin->toArray();
        $this->assertArrayNotHasKey('password', $array);
    }

    public function test_brand_can_be_created(): void
    {
        $brand = Brand::factory()->create();
        $this->assertDatabaseHas('brands', ['name' => $brand->name]);
    }

    public function test_brand_has_ordered_scope(): void
    {
        Brand::factory()->create(['order' => 3, 'name' => 'Third']);
        Brand::factory()->create(['order' => 1, 'name' => 'First']);
        Brand::factory()->create(['order' => 2, 'name' => 'Second']);

        $brands = Brand::ordered()->get();

        $this->assertEquals('First', $brands->first()->name);
        $this->assertEquals('Third', $brands->last()->name);
    }

    public function test_brand_has_many_products(): void
    {
        $brand = Brand::factory()->create();
        Product::factory()->count(3)->create(['brand_id' => $brand->id]);

        $this->assertCount(3, $brand->products);
    }

    public function test_product_can_be_created(): void
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create(['brand_id' => $brand->id]);

        $this->assertDatabaseHas('products', ['name' => $product->name]);
    }

    public function test_product_belongs_to_brand(): void
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create(['brand_id' => $brand->id]);

        $this->assertEquals($brand->id, $product->brand->id);
    }

    public function test_product_has_active_scope(): void
    {
        Product::factory()->create(['status' => 'active']);
        Product::factory()->create(['status' => 'inactive']);

        $activeProducts = Product::active()->get();

        $this->assertCount(1, $activeProducts);
        $this->assertEquals('active', $activeProducts->first()->status);
    }

    public function test_product_has_ordered_scope(): void
    {
        Product::factory()->create(['order' => 3]);
        Product::factory()->create(['order' => 1]);
        Product::factory()->create(['order' => 2]);

        $products = Product::ordered()->get();

        $this->assertEquals(1, $products->first()->order);
        $this->assertEquals(3, $products->last()->order);
    }

    public function test_project_can_be_created(): void
    {
        $brand = Brand::factory()->create();
        $project = Project::factory()->create(['brand_id' => $brand->id]);

        $this->assertDatabaseHas('projects', ['title' => $project->title]);
    }

    public function test_project_belongs_to_brand(): void
    {
        $brand = Brand::factory()->create();
        $project = Project::factory()->create(['brand_id' => $brand->id]);

        $this->assertEquals($brand->id, $project->brand->id);
    }

    public function test_project_has_published_scope(): void
    {
        Project::factory()->create(['status' => 'published']);
        Project::factory()->create(['status' => 'draft']);

        $published = Project::published()->get();

        $this->assertCount(1, $published);
        $this->assertEquals('published', $published->first()->status);
    }

    public function test_project_tags_cast_to_array(): void
    {
        $project = Project::factory()->create(['tags' => ['tag1', 'tag2']]);

        $this->assertIsArray($project->tags);
        $this->assertContains('tag1', $project->tags);
    }

    public function test_article_can_be_created(): void
    {
        $article = Article::factory()->create();

        $this->assertDatabaseHas('articles', ['title' => $article->title]);
    }

    public function test_article_has_published_scope(): void
    {
        Article::factory()->create(['status' => 'published']);
        Article::factory()->create(['status' => 'draft']);

        $published = Article::published()->get();

        $this->assertCount(1, $published);
    }

    public function test_article_has_draft_scope(): void
    {
        Article::factory()->create(['status' => 'published']);
        Article::factory()->create(['status' => 'draft']);

        $drafts = Article::draft()->get();

        $this->assertCount(1, $drafts);
    }

    public function test_contact_can_be_created(): void
    {
        $contact = Contact::factory()->create();

        $this->assertDatabaseHas('contacts', ['email' => $contact->email]);
    }

    public function test_setting_can_be_created(): void
    {
        $setting = Setting::factory()->create();

        $this->assertDatabaseHas('settings', ['key' => $setting->key]);
    }

    public function test_setting_get_method(): void
    {
        Setting::factory()->create(['key' => 'site_name', 'value' => 'My Site']);

        $this->assertEquals('My Site', Setting::get('site_name'));
        $this->assertNull(Setting::get('nonexistent'));
        $this->assertEquals('default', Setting::get('nonexistent', 'default'));
    }

    public function test_setting_set_method(): void
    {
        Setting::set('site_name', 'New Site');

        $this->assertEquals('New Site', Setting::get('site_name'));

        Setting::set('site_name', 'Updated Site');
        $this->assertEquals('Updated Site', Setting::get('site_name'));
    }

    public function test_media_can_be_created(): void
    {
        $media = Media::factory()->create();

        $this->assertDatabaseHas('media', ['filename' => $media->filename]);
    }

    public function test_media_size_cast_to_integer(): void
    {
        $media = Media::factory()->create(['size' => '1024000']);

        $this->assertIsInt($media->size);
        $this->assertEquals(1024000, $media->size);
    }
}
