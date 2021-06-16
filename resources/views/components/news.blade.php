<div class="col-lg-3 col-12 right-single">
    <div class="widget-categories">
        <h3 class="widget-title">Tin mới nhất</h3>
        <ul>
            @foreach($news as $newItem)
                <li>
                    <div class="row">
                        <div class="flex-row mt-3">
                            <div class="flex-column news-left">
                                <a href="{{ route('news.detail',['id' => $newItem->id]) }}">
                                    <img class="rounded-circle"
                                        src="{{ asset($newItem->image_path) }}"
                                        width="100" height="100">
                                </a>
                            </div>
                            <div class="flex-column new-right ml-2">
                                <a href="#">
                                    {!! \Illuminate\Support\Str::limit($newItem->title,110) !!}
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
