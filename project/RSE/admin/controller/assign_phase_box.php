<?php 
define('DIR', '../../');
require_once DIR . 'config.php';
if (isset($_POST['nop'])) 
{
    $nop = $_POST['nop'];
	$admin = new Admin();
    $tab = '';
    $i = 1;
    for ($i=1; $i <= $nop; $i++) 
    { 
        $tab .= '<h3 class="text-center">Phase-'.$i.'</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Phase</label>
                                <input type="text" name="phase[]" value="Phase-'.$i.'" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Description</label>
                                <input type="text" name="desc[]" placeholder="Phase Description" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Deliverable Content</label>
                                <input type="text" name="dcontent[]" placeholder="Deliverable Content" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">Phase Due Date</label>
                                    <input type="date" name="duedate[]" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Phase Marks</label>
                                    <input type="number" name="marks[]" placeholder="Enter Phase Mark" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date"> Attachment(PDF)</label>
                                    <input type="file" name="attachment[]" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Phase Note</label>
                                    <input type="text" name="note[]" placeholder="Enter Phase Note" required="">
                                </div>
                            </div>
                        </div>
                        <hr>';
    }
    echo $tab;
}

?>