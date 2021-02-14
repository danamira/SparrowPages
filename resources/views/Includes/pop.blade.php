@if($errors->any() or session()->has('pop'))
    @if($errors->any())
        <div class="pop error">
            <i class="mdi mdi-alert-circle"></i>
            <p>{{readyToGo($errors->first())}}</p>
        </div>
    @else
        <div class="pop {{session()->get('pop')['class']}}">
            @if(session()->get('pop')['class']=='success')
                <i class="mdi mdi-checkbox-marked-circle-outline"></i>
            @elseif(session()->get('pop')['class']=='error')
                <i class="mdi mdi-alert-circle-outline"></i>
            @endif
            <p>{{session()->get('pop')['msg']}}</p>
        </div>
    @endif
@endif
