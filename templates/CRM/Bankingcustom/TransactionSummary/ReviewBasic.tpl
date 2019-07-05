<table>
    <tr>
        <td colspan="8">
            <div class="btxheader" style="text-align: center">
                {ts domain='org.project60.banking'}BASIC INFO{/ts}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            Amount:
        </td>
        <td>
            <div style="text-align: left;" class="{if $payment->amount lt 0} btxamtneg{/if}{if $payment->amount gte 10000} btxamtlarge{/if}{if $payment->amount lte -10000} btxamtlarge{/if}">
                {$payment->amount}
                {$payment->currency}
            </div>
        </td>
        <td>
            {ts domain='org.project60.banking'}Booking Date{/ts}
        </td>
        <td>
            {$payment->booking_date|truncate:10:''}
        </td>
        <td>
            {ts domain='org.project60.banking'}Value Date{/ts}</div>
        </td>
        <td>
            {$payment->value_date|truncate:10:''}
        </td>
        <td>
            {ts domain='org.project60.banking'}Status{/ts}
        </td>
        <td>
            {$btxstatus.label}
        </td>
    </tr>
</table>