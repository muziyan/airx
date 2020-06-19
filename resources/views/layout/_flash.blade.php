<style>
    .alert-box{
        position: fixed;
        top:120px;
        left:50%;
        font-size:14px;
        transform: translateX(-50%);
    }
    .alert{
        width:300px;
        height:35px;
        text-align: center;
        line-height: 35px;
        border-radius: 20px;
        opacity: 0;
        animation: hide 4s forwards;
        transition:opacity 2s;
        margin-bottom: 10px;
    }
    .alert-error{
        color:#721c24;
        background-color: #f8d7da;
    }
    .alert-success{
        color:#155724;
        background-color: #d4edda;
    }
    @keyframes hide {
        0%,100%{
            opacity: 0;
        }
        25%,75%{
            transform: translateY(-100px);
            opacity: .5;
        }
        50%{
            opacity: 1;
        }
    }
</style>

@if(session('success'))
    <div class="alert-box">
        <div class="alert alert-success">
            {{session("success")}}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="alert-box">
        <div class="alert alert-error">
            {{session("error")}}
        </div>
    </div>
@endif

<div class="alert-box">
    @foreach($errors->all() as $message)
        <div class="alert alert-error">
            {{$message}}
        </div>
    @endforeach
</div>
