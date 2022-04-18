<?php
class FormBootstrap
{
    public static $inputType;
    public static $id;
    public static $labelName;

    public static function horizontalInput($inputType, $labelName, $id)
    {
        // Horizontal Form input
        echo '
        <div class="row mb-3">
            <label for="' . $id . '" class="col-sm-2 col-form-label">' . $labelName . '</label>
            <div class="col-sm-10">
                <input type="' . $inputType . '" class="form-control" id="' . $id . '">
            </div>
        </div>
        ';
    }
}
