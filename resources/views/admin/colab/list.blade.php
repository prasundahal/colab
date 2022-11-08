
  @php
  // echo '<pre>';
  // print_r(json_decode($colab->details));
  // echo '</pre>';
  $details = json_decode($colab->details,true);
  @endphp
  <div class="row">    
    @foreach ($details as $item)   
        <div class="col-md-12 form-group">
          <label for="">{{$item['question']}}</label>
          @if ($item['type'] != 'image')  
            @if ($item['answer'] == 'yes')  
            <br> 
            <span class="badge badge-success">{{ucwords($item['answer'])}}</span>
            @elseif($item['answer'] == 'no') 
              <br> 
              <span class="badge badge-danger">{{ucwords($item['answer'])}}</span>
            @else
              <p>
                {{ucwords($item['answer'])}}
              </p>
            @endif  
          @else
          <br>
          <a href="{{asset('/images/form-images/'.$item['image'])}}" target="_blank">
            <img src="{{asset('/images/form-images/'.$item['image'])}}" style="width:300px;height: 300px;object-fit: cover;" alt="">

          </a>
          @endif
        </div>
    @endforeach
  </div>