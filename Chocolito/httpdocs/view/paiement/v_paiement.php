<form method="POST" action="<?php echo $serveurOK; ?>" target="iframePayment">
<input type="hidden" name="PBX_SITE" value="<?php echo $pbx_site; ?>">
<input type="hidden" name="PBX_RANG" value="<?php echo $pbx_rang; ?>">
<input type="hidden" name="PBX_IDENTIFIANT" value="<?php echo $pbx_identifiant; ?>">
<input type="hidden" name="PBX_TOTAL" value="<?php echo $pbx_total; ?>">
<input type="hidden" name="PBX_DEVISE" value="978">
<input type="hidden" name="PBX_CMD" value="<?php echo $pbx_cmd; ?>">
<input type="hidden" name="PBX_PORTEUR" value="<?php echo $pbx_porteur; ?>">
<input type="hidden" name="PBX_REPONDRE_A" value="<?php echo $pbx_repondre_a; ?>">
<input type="hidden" name="PBX_RETOUR" value="<?php echo $pbx_retour; ?>">
<input type="hidden" name="PBX_EFFECTUE" value="<?php echo $pbx_effectue; ?>">
<input type="hidden" name="PBX_ANNULE" value="<?php echo $pbx_annule; ?>">
<input type="hidden" name="PBX_REFUSE" value="<?php echo $pbx_refuse; ?>">
<input type="hidden" name="PBX_HASH" value="SHA512">
<input type="hidden" name="PBX_TIME" value="<?php echo $dateTime; ?>">
<input type="hidden" name="PBX_SHOPPINGCART" value="<?php echo htmlspecialchars($pbx_shoppingcart); ?>">
<input type="hidden" name="PBX_BILLING" value="<?php echo htmlspecialchars($pbx_billing); ?>">
<input type="hidden" name="PBX_SOUHAITAUTHENT" value="<?php echo $pbx_souhaitauthent; ?>">
<input type="hidden" name="PBX_HMAC" value="<?php echo $hmac; ?>">
<input type="hidden" name="PBX_RUF1" value="<?php echo $pbx_ruf1; ?>">
<input type="submit" value="Envoyer dans l'iFrame">
</form>
<br/><br/>
IFrame payment<br />
<iframe name="iframePayment" title="iframe payment page" width="450" height="500" style="border: 1px solid">
</iFrame>
