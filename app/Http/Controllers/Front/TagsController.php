<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Car;
use App\Models\DynamicContent;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Http\Request;
class TagsController extends Controller
{
    //show all tags
    public function show_all_tags()

    {
        $show_all_tags = Tag::Active()->paginate(25);

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        $page_links = FooterPageLinks();        

        return view('front.pages.tags.tags_group', compact('tags','show_all_tags','sections','articles','first_articles','last_articles','cars','page_links'));
    }
    //show one tag
    public function show_one_tag($slug)

    {
        $tag = Tag::where('slug', $slug)->first();

        if (!$tag) {
            return redirect()->route('404.index');
        }
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        $page_links = FooterPageLinks();
        $tag_contents =  DynamicContent::Where('name','tag')->Where('active','1')->first(); 
               

        return view('front.pages.tags.tag', compact('tag','sections','articles','tags','first_articles','last_articles','cars','page_links','tag_contents'));

}
    //show one tag
    public function show_tag_cars($id)
    {
        $tag = Tag::with('cars')->find($id);
        return $tag;

    }

}