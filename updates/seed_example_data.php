<?php namespace ArrizalAmin\Portfolio\Updates;

use ArrizalAmin\Portfolio\Models\Category;
use ArrizalAmin\Portfolio\Models\Item;
use ArrizalAmin\Portfolio\Models\Tag;
use October\Rain\Database\Updates\Seeder;

class SeedExampleData extends Seeder
{

    public function run()
    {
        // exit when items are found
        if(count(Item::all()) > 0) {
            return false;
        }
        
        /**
         * Add example categories
         */
        $ec = Category::create([
            'name' => 'Examples',
            'slug' => 'examples'
        ]);

        /**
         * Add example tags
         */
        $t1 = Tag::create([
            'name' => 'one',
        ]);
        $t2 = Tag::create([
            'name' => 'two',
        ]);
        $t3 = Tag::create([
            'name' => 'three',
        ]);

        /**
         * Add example items
         */
        $i1 = Item::create([
            'category_id' => $ec->id,
            'title' => 'Proactively disseminate',
            'slug' => 'proactively',
            'description' => 'Proactively disseminate parallel markets after open-source e-services. Quickly administrate goal-oriented sources through turnkey human capital. Intrinsicly transition installed base schemas with reliable resources. Proactively leverage other\'s compelling mindshare with interoperable applications. Holisticly aggregate transparent metrics through just in time value. Conveniently target pandemic paradigms through leading-edge intellectual capital. Authoritatively create next-generation products rather than reliable platforms. Dramatically predominate robust materials rather than principle-centered innovation. Quickly simplify market positioning niches through equity invested outsourcing. Intrinsicly integrate progressive niche markets.',
        ]);

        $i1->tags()->attach($t1->id);

        $i2 = Item::create([
            'category_id' => $ec->id,
            'title' => 'Intrinsicly integrate',
            'slug' => 'intrinsicly',
            'description' => 'Intrinsicly integrate future-proof e-tailers whereas high-quality users. Conveniently procrastinate world-class e-business vis-a-vis stand-alone technology. Competently streamline bleeding-edge process improvements after user friendly e-business. Dynamically myocardinate sticky results and visionary schemas. Assertively streamline standardized materials with distributed total linkage. Distinctively envisioneer multimedia based mindshare via extensive core competencies. Conveniently deliver market positioning initiatives before sustainable convergence. Collaboratively myocardinate stand-alone results for exceptional best practices. Completely initiate global mindshare with frictionless ideas. Synergistically reintermediate wireless intellectual capital rather than reliable.',
        ]);

        $i2->tags()->attach([$t1->id, $t2->id]);

        $i3 = Item::create([
            'category_id' => $ec->id,
            'title' => 'Collaboratively initiate',
            'slug' => 'collaboratively',
            'description' => 'Collaboratively initiate top-line catalysts for change via process-centric growth strategies. Monotonectally leverage existing functional initiatives via enabled process improvements. Synergistically benchmark synergistic supply chains and economically sound supply chains. Assertively productivate front-end outsourcing and next-generation experiences. Progressively myocardinate intuitive scenarios with optimal e-services. Holisticly initiate pandemic platforms via granular human capital. Monotonectally promote diverse web-readiness without competitive niche markets. Enthusiastically evisculate enterprise-wide customer service with business vortals. Synergistically cultivate ethical information with bleeding-edge products. Globally evisculate functional networks.',
        ]);

        $i3->tags()->attach([$t1->id, $t2->id, $t3->id]);

        //TODO: find a way to attach sample images to the items.
    }

}
