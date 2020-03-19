 <?php
function confirmmodal($confirm){ 
       echo "<div class='modal fade' id='confirmmodal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
         <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalCenterTitle'>Booking confirmation</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
            {$confirm}
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
            
          
          <a href='#' class='btn btn-danger'  id='modalDelete' >Delete</a>  
          </div>
        </div>
      </div>
    </div>";
    }

?>