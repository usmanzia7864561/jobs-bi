<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Comment;
use App\Models\Post;

class SoftDeleteOld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:soft-delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft delete old content';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $old = $now->subHours(3);

        $affectedPosts = Post::where('deleted_at', null)->whereDate('created_at', '<', $now->toDateTimeString())->update(['deleted_at' => $now->format("Y-m-d H:i:s")]);

        $affectedComments = Comment::where('deleted_at', null)->whereDate('created_at', '<', $now->toDateTimeString())->update(['deleted_at' => $now->format("Y-m-d H:i:s")]);

        echo "Affected: \n- Posts: $affectedPosts\n- Comments: $affectedComments\n";
        return Command::SUCCESS;
    }
}
