{if version_compare($smarty.const._PS_VERSION_, '1.6', '<')}
<p id="mtpayment" class="payment_module">
  <a href="#"
     class="mtpayment-submit"
     data-language="{$lang_iso|escape:'htmlall':'UTF-8'}"
     data-customer-email="{$customer_email}"
     data-amount="{$amount|escape:'htmlall':'UTF-8'}"
     data-currency="{$cart_currency_iso_code|escape:'htmlall':'UTF-8'}"
     data-transaction="{$transaction|escape:'htmlall':'UTF-8'}">
    {l s='Checkout' mod='mtpayment'} {convertPrice price=$amount}
  </a>
</p>
{else}
<div class="row">
  <div class="col-xs-12">
    <p id="mtpayment" class="payment_module">
      <a href="#"
         class="mtpayment-submit"
         data-language="{$lang_iso|escape:'htmlall':'UTF-8'}"
         data-customer-email="{$customer_email}"
         data-amount="{$amount|escape:'htmlall':'UTF-8'}"
         data-currency="{$cart_currency_iso_code|escape:'htmlall':'UTF-8'}"
         data-transaction="{$transaction|escape:'htmlall':'UTF-8'}">
        {l s='Checkout' mod='mtpayment'} {convertPrice price=$amount}
      </a>
    </p>
  </div>
</div>
{/if}
