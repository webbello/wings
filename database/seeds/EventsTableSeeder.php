<?php

use Illuminate\Database\Seeder;
use App\Models\Event;


class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::truncate();
        Event::create([
            'title' => 'Personality Development Seminar',
            'slug' => 'personality-development-seminar',
            'image' => 'personality-development-seminar.jpg',
            'description' => 'Personality Development Seminar',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2009-06-02 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Each one teach one',
            'slug' => 'each-one-teach-one',
            'image' => 'each-one-teach-one.jpg',
            'description' => 'Each one teach one',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Felicitation program',
            'slug' => 'each-one-teach-one',
            'image' => 'felicitation-program.jpg',
            'description' => 'Felicitation program',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);

        Event::create([
            'title' => 'Career Counselling program',
            'slug' => 'each-one-teach-one',
            'image' => 'career-counselling-program.png',
            'description' => 'Career Counselling program',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Wings Mission and Orientation Program',
            'slug' => 'each-one-teach-one',
            'image' => 'wings-mission-and-orientation-program.jpg',
            'description' => 'Wings Mission and Orientation Program',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Workshop: “Why and How to read and write efficiently”',
            'slug' => 'each-one-teach-one',
            'image' => 'workshop-why-and-how-to-read-and-write-efficiently.png',
            'description' => 'Workshop: “Why and How to read and write efficiently”',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Quiz and Essay competition - H2',
            'slug' => 'each-one-teach-one',
            'image' => 'quiz-and-essay-competition.jpg',
            'description' => 'Quiz and Essay competition - H2',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Quiz and Essay competition - H1',
            'slug' => 'each-one-teach-one',
            'image' => 'quiz-and-essay-competition.jpg',
            'description' => 'Quiz and Essay competition - H1',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Computer Literacy program - 1',
            'slug' => 'each-one-teach-one',
            'image' => 'computer-literacy-program-1.png',
            'description' => 'Computer Literacy program - 1',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Computer Literacy program - 2',
            'slug' => 'each-one-teach-one',
            'image' => 'computer-literacy-program-2.png',
            'description' => 'Computer Literacy program - 2',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Medical awareness camp and 1x1 Q&A for females',
            'slug' => 'each-one-teach-one',
            'image' => 'medical-awareness-camp-and-1x1-qa-for-females.jpg',
            'description' => 'Medical awareness camp and 1x1 Q&A for females',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Book exhibition',
            'slug' => 'each-one-teach-one',
            'image' => 'book-exhibition.jpg',
            'description' => 'Book exhibition',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Penmanship',
            'slug' => 'each-one-teach-one',
            'image' => 'penmanship.png',
            'description' => 'Penmanship',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Invigilation',
            'slug' => 'each-one-teach-one',
            'image' => 'invigilation.jpg',
            'description' => 'Invigilation',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2010-01-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Each one teach one',
            'slug' => 'each-one-teach-one',
            'image' => 'each-one-teach-one.jpg',
            'description' => 'Each one teach one',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2019-11-26 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Computer Literacy program',
            'slug' => 'each-one-teach-one',
            'image' => 'computer-literacy-program.png',
            'description' => 'Computer Literacy program',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2019-11-27 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
        Event::create([
            'title' => 'Personality development',
            'slug' => 'each-one-teach-one',
            'image' => 'personality-development.jpg',
            'description' => 'Personality development',
            'venue' => 'M. O. Ghani',
            'city' => 'Kolkata',
            'country' => 'India',
            'event_date' => '2019-12-27 10:00:00',
            'status' => 0,
            'created_by' => 1,
        ]);
    }
}
