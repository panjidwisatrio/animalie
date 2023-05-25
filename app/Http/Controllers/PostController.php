<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comment'])
            ->latest()
            ->paginate(5);

        $tags = Tag::all();

        return view('dashboard', compact('posts', 'tags'));
    }

    public function loadMore(Request $request)
    {
        $page = $request->page;
        $typeNavigation = $request->typeNavigation;

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])
                ->more($page)
                ->latest()
                ->get();
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->selectedCategory;
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])
                ->morecategory($page, $category)
                ->latest()
                ->get();
        } else if ($typeNavigation == 'tag') {
            $selectedTag = $request->selectedTag;
            $posts = Post::with(['user', 'category', 'comment'])
                ->moretag($page, $selectedTag)
                ->latest()
                ->get();
        }

        $view = view('post.morePost', compact('posts'))->render();
        return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
    }

    public function loadMorePopular(Request $request)
    {
        $page = $request->page;
        $typeNavigation = $request->typeNavigation;

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])
                ->morepopular($page)
                ->get();
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->selectedCategory;
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])
                ->morecategorypopular($page, $category)
                ->get();
        } else if ($typeNavigation == 'tag') {
            $selectedTag = $request->selectedTag;
            $posts = Post::with(['user', 'category', 'comment'])
                ->moretagpopular($page, $selectedTag)
                ->get();
        }

        $view = view('post.morePost', compact('posts'))->render();
        return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
    }

    public function loadMoreUnanswerd(Request $request)
    {
        $page = $request->page;
        $typeNavigation = $request->typeNavigation;

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])
                ->moreunanswerd($page)
                ->get();
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->selectedCategory;
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])
                ->morecategoryunanswerd($page, $category)
                ->get();
        } else if ($typeNavigation == 'tag') {
            $selectedTag = $request->selectedTag;
            $posts = Post::with(['user', 'category', 'comment'])
                ->moretagunanswerd($page, $selectedTag)
                ->get();
        }

        $view = view('post.morePost', compact('posts'))->render();
        return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
    }

    public function loadMoreInterestGroup(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->page;
            $selectedCategory = $request->selectedCategory;
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])
                ->morecategory($page, $category)
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        }
    }

    public function loadMoreTag(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->page;
            $selectedTag = $request->selectedTag;
            $posts = Post::with(['user', 'category', 'comment'])
                ->moretag($page, $selectedTag)
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        }
    }

    public function loadMoreMyPost(Request $request)
    {
        $page = $request->page;
        $typeNavigation = $request->typeNavigation;
        $userId = $request->input('userId');

        $posts = Post::with(['user', 'category', 'comment'])
            ->latest()
            ->moremypost($page, $userId)
            ->get();

        if ($typeNavigation == 'mypost') {
            $view = view('profile.moreMyPost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        } else if ($typeNavigation == 'otherpost') {
            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        }

    }

    public function loadMoreSavedPost(Request $request)
    {
        $page = $request->page;
        $typeNavigation = $request->typeNavigation;
        $id = $request->input('userId');
        $user = User::find($id);

        $posts = Post::with(['user', 'category', 'comment'])
            ->moresavedpost($page, $user)
            ->get();

        $view = view('post.morePost', compact('posts'))->render();
        return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);

    }

    public function loadMoreDiscussion(Request $request)
    {
        $page = $request->page;
        $typeNavigation = $request->typeNavigation;
        $userId = $request->input('userId');

        $posts = Post::with(['user', 'category', 'comment'])
            ->morediscussion($page, $userId)
            ->get();

        $view = view('post.morePost', compact('posts'))->render();
        return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);

    }

    public function loadMoreSearchLatest(Request $request)
    {
        $page = $request->page;
        $search = $request->query('search');
        $typeNavigation = $request->input('typeNavigation');

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearch($page, $search)
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        } else if ($typeNavigation = 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearchcategory($page, $search, $category)
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearchtag($page, $search, $tag)
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);

        }
    }

    public function loadMoreSearchPopular(Request $request)
    {
        $page = $request->page;
        $search = $request->query('search');
        $typeNavigation = $request->input('typeNavigation');

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearch($page, $search)
                ->popular()
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        } else if ($typeNavigation = 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearchcategory($page, $search, $category)
                ->popular()
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearchtag($page, $search, $tag)
                ->popular()
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);

        }
    }

    public function loadMoreSearchUnanswerd(Request $request)
    {
        $page = $request->page;
        $search = $request->query('search');
        $typeNavigation = $request->input('typeNavigation');

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearch($page, $search)
                ->unanswerd()
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        } else if ($typeNavigation = 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearchcategory($page, $search, $category)
                ->unanswerd()
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            $posts = Post::with(['user', 'category', 'comment'])
                ->moresearchtag($page, $search, $tag)
                ->unanswerd()
                ->get();

            $view = view('post.morePost', compact('posts'))->render();
            return response()->json(['html' => $view, 'page' => $page, 'posts' => $posts]);

        }
    }

    public function load_more_search_mypost(Request $request)
    {
        $page = $request->page;
        $search = $request->query('search');
        $typeNavigation = $request->input('type');
        $userId = $request->input('userId');
        
        $posts = Post::with(['user', 'category', 'comment'])->moresearchmypost($page, $search, $userId)->paginate(5);
        
        if ($typeNavigation == 'myprofile') {
            $viewRendered = view('profile.moreMyPost', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'html' => $viewRendered,
            ]);
        } else if ($typeNavigation == 'otherprofile') {
            $viewRendered = view('post.morePost', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'html' => $viewRendered,
            ]);
        }
    }

    public function load_more_search_discussion(Request $request)
    {
        $page = $request->page;
        $search = $request->query('search');
        $typeNavigation = $request->input('type');
        $userId = $request->input('userId');

        $posts = Post::with(['user', 'category', 'comment'])->moresearchdiscussion($page, $search, $userId)->paginate(5);
        
        if ($typeNavigation == 'myprofile') {
            $viewRendered = view('profile.moreMyPost', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'html' => $viewRendered,
            ]);
        } else if ($typeNavigation == 'otherprofile') {
            $viewRendered = view('post.morePost', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'html' => $viewRendered,
            ]);
        }
    }

    public function load_more_search_savedpost(Request $request)
    {
        $page = $request->page;
        $search = $request->query('search');
        $typeNavigation = $request->input('type');
        $id = $request->input('userId');
        $user = User::find($id);

        $posts = Post::with(['user', 'category', 'comment'])->moresearchsavedpost($search, $user)->paginate(5);

        if ($typeNavigation == 'myprofile') {
            $viewRendered = view('profile.moreMyPost', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'html' => $viewRendered,
            ]);
        } else if ($typeNavigation == 'otherprofile') {
            $viewRendered = view('post.morePost', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'html' => $viewRendered,
            ]);
        }
    }

    public function latest(Request $request)
    {
        $typeNavigation = $request->input('type');

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])->latest()->paginate(5);
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])->latest()->where('category_id', $category)->paginate(5);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            $posts = Post::with(['user', 'category', 'comment'])->latest()->tag($tag)->paginate(5);
        }

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered,
            'type' => $typeNavigation
        ]);
    }

    public function popular(Request $request)
    {
        $typeNavigation = $request->input('type');

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])->popular()->paginate(5);
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])->popular()->where('category_id', $category)->paginate(5);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            $posts = Post::with(['user', 'category', 'comment'])->popular()->tag($tag)->paginate(5);
        }

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered,
            'type' => $typeNavigation
        ]);
    }

    public function unanswerd(Request $request)
    {
        $typeNavigation = $request->input('type');

        if ($typeNavigation == 'dashboard') {
            $posts = Post::with(['user', 'category', 'comment'])->unanswerd()->paginate(5);
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            $posts = Post::with(['user', 'category', 'comment'])->unanswerd()->where('category_id', $category)->paginate(5);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            $posts = Post::with(['user', 'category', 'comment'])->unanswerd()->tag($tag)->paginate(5);
        }

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered,
            'type' => $typeNavigation
        ]);
    }

    public function mypost(Request $request)
    {
        $typeNavigation = $request->input('type');
        $userId = $request->input('userId');
        $posts = Post::with(['user', 'category', 'comment'])->latest()->mypost($userId)->paginate(5);

        if ($typeNavigation == 'myprofile') {
            $viewRendered = view('components.component-my-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        } else if ($typeNavigation == 'otherprofile') {
            $viewRendered = view('components.component-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        }

    }

    public function discussion(Request $request)
    {
        $typeNavigation = $request->input('type');
        $userId = $request->input('userId');
        $posts = Post::with(['user', 'category', 'comment'])->discussion($userId)->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered,
        ]);
    }

    public function search_mypost(Request $request)
    {
        $search = $request->query('search');
        $typeNavigation = $request->input('type');
        $userId = $request->input('userId');

        if($search) {
            $posts = Post::with(['user', 'category', 'comment'])->latest()->searchmypost($search, $userId)->paginate(5);
        } else {
            $posts = Post::with(['user', 'category', 'comment'])->latest()->mypost($userId)->paginate(5);
        }

        if ($typeNavigation == 'myprofile') {
            $viewRendered = view('components.component-my-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        } else if ($typeNavigation == 'otherprofile') {
            $viewRendered = view('components.component-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        }
    }

    public function search_discussion(Request $request)
    {
        $search = $request->query('search');
        $typeNavigation = $request->input('type');
        $userId = $request->input('userId');

        if($search) {
            $posts = Post::with(['user', 'category', 'comment'])->searchdiscussion($search, $userId)->paginate(5);
        } else {
            $posts = Post::with(['user', 'category', 'comment'])->discussion($userId)->paginate(5);
        }

        if ($typeNavigation == 'myprofile') {
            $viewRendered = view('components.component-my-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        } else if ($typeNavigation == 'otherprofile') {
            $viewRendered = view('components.component-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        }
    }

    public function search_savedpost(Request $request)
    {
        $search = $request->query('search');
        $typeNavigation = $request->input('type');
        $userId = $request->input('userId');

        if($search) {
            $posts = Post::with(['user', 'category', 'comment'])->searchmysavedpost($search, $userId)->paginate(5);
        } else {
            $posts = Post::with(['user', 'category', 'comment'])->mysavedpost($userId)->paginate(5);
        }

        if ($typeNavigation == 'myprofile') {
            $viewRendered = view('components.component-my-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        } else if ($typeNavigation == 'otherprofile') {
            $viewRendered = view('components.component-posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
            ]);
        }
    }

    public function savedPost_show(Request $request)
    {
        $id = $request->input('userId');
        $user = User::find($id);
        $posts = Post::with(['user', 'category', 'comment'])->mysavedpost($user)->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered,
        ]);
    }

    public function search(Request $request)
    {
        $search = request()->query('search');
        $typeNavigation = $request->input('type');

        if ($typeNavigation == 'dashboard') {
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->latest()->search($search)->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->latest()->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered,
                'post_data' => $posts,
            ]);
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->latest()->searchcategory($search, $category)->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->latest()->category($category)->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->latest()->searchtag($search, $tag)->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->latest()->tag($tag)->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        }

    }

    public function searchPopular(Request $request)
    {
        $search = request()->query('search');
        $typeNavigation = $request->input('type');

        if ($typeNavigation == 'dashboard') {
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->search($search)->popular()->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->popular()->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->searchcategory($search, $category)->popular()->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->category($category)->popular()->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->searchtag($search, $tag)->popular()->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->tag($tag)->popular()->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        }
    }

    public function searchUnanswerd(Request $request)
    {
        $search = request()->query('search');
        $typeNavigation = $request->input('type');

        if ($typeNavigation == 'dashboard') {
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->search($search)->unanswerd()->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->unanswerd()->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        } else if ($typeNavigation == 'interestGroup') {
            $selectedCategory = $request->input('selectedCategory');
            switch ($selectedCategory) {
                case 'cow':
                    $category = 1;
                    break;
                case 'poultry':
                    $category = 2;
                    break;
                case 'goat':
                    $category = 3;
                    break;
                case 'sheep':
                    $category = 4;
                    break;
                case 'fish':
                    $category = 5;
                    break;
                case 'other':
                    $category = 6;
                    break;
            }
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->searchcategory($search, $category)->unanswerd()->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->category($category)->unanswerd()->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        } else if ($typeNavigation == 'tag') {
            $tag = $request->input('selectedTag');
            if ($search) {
                $posts = Post::with(['user', 'category', 'comment'])->searchtag($search, $tag)->unanswerd()->paginate(5);
            } else {
                $posts = Post::with(['user', 'category', 'comment'])->tag($tag)->unanswerd()->paginate(5);
            }
            $viewRendered = view('post.posts', compact('posts'))->render();
            return response()->json([
                'success' => true,
                'message' => 'Post sorted',
                'posts' => $viewRendered
            ]);
        }
    }

    public function show_cow(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comment'])
            ->showcow()
            ->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered
        ]);
    }

    public function show_poultry(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comment'])
            ->showpoultry()
            ->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered
        ]);
    }

    public function show_sheep(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comment'])
            ->showsheep()
            ->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered
        ]);
    }

    public function show_goat(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comment'])
            ->showgoat()
            ->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered
        ]);
    }

    public function show_fish(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comment'])
            ->showfish()
            ->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered
        ]);
    }

    public function show_other(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comment'])
            ->showother()
            ->paginate(5);

        $viewRendered = view('components.component-posts', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Post sorted',
            'posts' => $viewRendered
        ]);
    }

    public function show(Post $post)
    {
        $post = Post::with(['user', 'category', 'tag'])->where('id', $post->id)->first();
        $comments = Comment::with(['user'])->where('post_id', $post->id)->latest()->get();

        return view('post.detailpost', compact('post', 'comments'));
    }

    public function interestgroup_show()
    {
        $posts = Post::with(['user', 'category'])
            ->showcow()
            ->paginate(5);

        $tags = Tag::all();
        return view('interestGroup', compact('tags', 'posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        if ($request->has('tags')) {
            $post->tag()->attach($request->tags);
        }

        return redirect()->route('dashboard');
    }

    public function upload(Request $request)
    {
        // TODO : Image excess issue
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = $request->file('upload')->store('post-images');

        $url = asset('storage/' . $fileName);

        return response()->json([
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => $url,
        ]);
    }

    public function checkSlug(Request $request)
    {
        $title = $request->input('title');
        $slug = SlugService::createSlug(Post::class, 'slug', $title, ['unique' => true]);
        return response()->json(['slug' => $slug]);
    }

    public function likePost($id)
    {
        $post = Post::find($id);

        if ($post->liked(auth()->user()->id)) {
            $post->unlike();
            $post->save();
        } else {
            $post->like();
            $post->save();
        }

        $liked = $post->liked(auth()->user()->id);

        return response()->json([
            'likeCount' => $post->likeCount,
            'liked' => $liked,
            'post' => $post,
        ]);
    }

    public function savedPost($id)
    {
        $post = Post::find($id);
        $user = auth()->user();
        $hasBookmarked = $user->hasBookmarked($post);

        if ($hasBookmarked) {
            $user->unbookmark($post);
            $user->save();
        } else {
            $user->bookmark($post);
            $user->save();
        }

        $saved = $user->hasBookmarked($post);

        return response()->json([
            'saved' => $saved,
            'hasBookmarked' => $hasBookmarked
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::with(['tag'])->where('id', $post->id)->first();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        if ($request->has('tags')) {
            $post->tag()->sync($request->tags);
        }

        return redirect()->route('profile.show');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post deleted'
        ]);
    }
}