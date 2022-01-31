<?php

namespace Database\Factories;

use App\Models\Mem;
use App\Models\MemTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MemTagFactory extends Factory
{
    protected $model = MemTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'mem_id' => function() {
                return Mem::factory()->create()->id;
            },
            'tag_id' => function(){
                return Tag::factory()->create()->id;
            },
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];
    }
}
