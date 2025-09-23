<h3>{{$job->title}}</h3>
<p>
    Congrats ! your job is now live on our website.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}"></a>
</p> 