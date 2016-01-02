<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Coleções</h2>
        <div class="panel-group category-products" id="accordian"><!--colections-productsr-->

            @foreach($colections as $colection)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{route('store.category',['id'=>$colection->id])}}">{{$colection->name}}</a>
                        </h4>
                    </div>
                </div>

            @endforeach

        </div><!--/colections-products-->
    </div>
</div>