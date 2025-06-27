<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Frontend Skills
        Skill::create(['name' => 'HTML5', 'category' => 'Frontend']);
        Skill::create(['name' => 'CSS3', 'category' => 'Frontend']);
        Skill::create(['name' => 'JavaScript', 'category' => 'Frontend']);
        Skill::create(['name' => 'Vue.js', 'category' => 'Frontend']);
        Skill::create(['name' => 'React', 'category' => 'Frontend']);
        Skill::create(['name' => 'Bootstrap', 'category' => 'Frontend']);

        // Backend Skills
        Skill::create(['name' => 'PHP', 'category' => 'Backend']);
        Skill::create(['name' => 'Laravel', 'category' => 'Backend']);
        Skill::create(['name' => 'Node.js', 'category' => 'Backend']);
        Skill::create(['name' => 'Python', 'category' => 'Backend']);
        Skill::create(['name' => 'Django', 'category' => 'Backend']);

        // Database Skills
        Skill::create(['name' => 'MySQL', 'category' => 'Database']);
        Skill::create(['name' => 'PostgreSQL', 'category' => 'Database']);
        Skill::create(['name' => 'MongoDB', 'category' => 'Database']);

        // Tools & Others
        Skill::create(['name' => 'Git', 'category' => 'Tools']);
        Skill::create(['name' => 'Docker', 'category' => 'Tools']);
        Skill::create(['name' => 'AWS', 'category' => 'Cloud']);
        Skill::create(['name' => 'RESTful APIs', 'category' => 'Concepts']);
    }
}
