<div class="formSearch-All">
    <div class="divSearchAll">
        {{ Form::open(['route' => 'endUser.index.searchNameAll', 'method' => 'POST']) }}
        <div class="s-text16 iCon-searchAll">
            <button href="#" class="topbar-social-item fa fa-search iCon-searchAll"></button>
        </div>
        <div class="s-text16 input-search-all">
            <input type="text" placeholder="WHAT IS LOOKING FOR ?" name="searchNameAll">
        </div>
        <div class="s-text16  diviconRemoveRecornd">
            <a href="#" class="topbar-social-item fa fa-times" aria-hidden="true" id="iconRemoveRecornd"></a>
        </div>
        {!! Form::close() !!}
    </div>
</div>