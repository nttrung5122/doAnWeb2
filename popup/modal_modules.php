<?php
class popupModules
{
    // modalId trong hàm tạo nút cần giống với id trong hàm tạo cửa sổ
    public static function btnToCallpopup($label, $modalId)
    {
        echo '
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">
            ' . $label . '
        </button>
        ';
    }

    public static function twoButtons($tittle, $text, $primaryBtn, $secondaryBtn, $id)
    {
        echo '
        <div class="modal fade" id="' . $id . '" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupLabel">' . $tittle . '</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Nội dung của pop-up -->
                    <div class="modal-body">
                        ' . $text . '
                    </div>
                    <div class="modal-footer">
                        <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">' . $primaryBtn . '</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">' . $secondaryBtn . '</button>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    public static function oneButtons($tittle, $text, $primaryBtn, $id)
    {
        echo '
        <div class="modal fade" id="' . $id . '" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupLabel">' . $tittle . '</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Nội dung của pop-up -->
                    <div class="modal-body">
                        ' . $text . '
                    </div>
                    <div class="modal-footer">
                        <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">' . $primaryBtn . '</button>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    public static function onlyWindows($tittle, $text, $id)
    {
        echo '
        <div class="modal fade" id="' . $id . '" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupLabel">' . $tittle . '</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ' . $text . '
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}
