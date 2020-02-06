<?php
/**
 * Created by PhpStorm.
 * User: John Ebarita
 * Date: 1/15/2020
 * Time: 3:17 PM
 */?>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <form action="logout" method="post">
                    <input type="text" value="true" name="logout" hidden/>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" href="<?=base_url()?>logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
