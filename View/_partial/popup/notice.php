<?php include './View/_partial/popup/modal_modules.php';
popupModules::onlyWindows("Chú ý", "<div id=\"notice\">test</div>", "noticePopup") ?>

<script>
    function showNotice(title) {
        document.getElementById("notice").innerHTML = title;
        $('#noticePopup').modal('show');
    }
</script>