<div class="formSearch-All">
    <div class="divSearchAll">
        {{ Form::open(['route' => 'endUser.index.searchAll', 'method' => 'GET']) }}
        <div class="s-text16 iCon-searchAll">
            <button href="#" class="topbar-social-item fa fa-search iCon-searchAll"></button>
        </div>
        <div class="s-text16 input-search-all">
            <input type="text" placeholder="WHAT IS LOOKING FOR ?" name="keyword">
        </div>
        <div class="s-text16  diviconRemoveRecornd">
            <span href="#" class="topbar-social-item fa fa-times" aria-hidden="true" id="iconRemoveRecornd"></span>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- <div class="pos-relative bo11 of-hidden">
    <input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

    <button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
        <i class="fs-13 fa fa-search" aria-hidden="true"></i>
    </button>
</div> -->