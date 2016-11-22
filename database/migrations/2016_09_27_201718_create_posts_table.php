    <?php

use App\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('author')->nullable()->default(null);
            $table->string('title');
            $table->string('meta_title')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('meta_description')->nullable()->default(null);
            $table->longText('content');
            $table->boolean('featured')->default(false);
            $table->string('status')->default(Post::STATUS_DRAFT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
