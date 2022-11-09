  <table style="width: 100%;border: 3px solid #dddddd;border-radius: 10px;padding: 20px 0 20px 0;width: 100%;">
   <tbody>
    @php
        $details = json_decode($details,true);
    @endphp
    
        <tr style="text-align: center;">
            <td>
            <img style="max-width: 20%;" src="<?php echo URL::to($details['theme']) ?>" alt="Game"> 
            </td>
        </tr>
       <tr>
           <td style="color: black;font-size: 15px;padding: 0 50px 0 50px;text-align:center;">
            <?php echo  $details['message'] ?>
            <br>
            <br>
            [<?php echo Carbon\Carbon::now().'   ('.config('app.timezone').')'  ?>]
            <br>
            Sincerely,
            <br>
            <b>
                <?php echo $details['title'] ?> 
            </b>
           </td>
       </tr>
   </tbody>
</table>
