<?php

function rel4summary_civicrm_summary( $contactID, &$content) {
$rel = civicrm_api ("relationship", "get", array("version"=>3,"contact_id"=>$contactID ));

$content = "<div id='relationships'>";
foreach ($rel["values"] as $r) {
  $content .= "<div class='crm-label'>". $r["relation"] 
           . "</div><div class='crm-content'><a href='"
           . CRM_Utils_System::url('civicrm/contact/view', "reset=1&cid=".$r['cid']). "'>" 
           .$r["display_name"]."</a></div>";
}
$content .=  <<< EOT
</div>
<script>
cj(function($){
  if ($("#crm-demographic-content").length == 0)
    return;
  $("#relationships").appendTo("#crm-demographic-content");
});
</script>
EOT;
 
}

