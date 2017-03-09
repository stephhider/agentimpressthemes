<html style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif">
<p>Congratulations on officially taking your marketing to the next level! We are honored to serve you and your clients.</p>
<p>Here is your receipt for your payment. If we can help you in any way, please let us know.</p>

<table>
    @foreach ($invoices as $invoice)
        <tr>
            <td>{{ $invoice->dateString() }}</td>
            <td>{{ $invoice->dollars() }}</td>
        </tr>
    @endforeach
</table>

<p>Thank you!</p>
<p>The <a href="https://agentimpress.me">agentimpress.me</a> Team</p>
<hr>
<p>Confidential and Privileged Communication: This electronic mail transmission, and any documents, files or previous e-mail messages attached to it, may contain confidential information that is legally privileged. If you are not the intended recipient, or person responsible for delivering it to the intended recipient you are hereby notified that any disclosure, copying, distribution or use of any of the information contained in or attached to this message is strictly prohibited. Interception of e-mail is a crime under the Electronic Communications Privacy Act, 18 U.S.C. 2510-2521and 2107 2709. If you have received this transmission in error, please immediately notify us by replying to this e-mail or by calling us and destroy the original transmission and its attachments without reading them or saving them to disk.</p>
</html>