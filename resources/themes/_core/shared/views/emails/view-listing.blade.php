<html style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif">

<p>Hello, {{ $client->name or  'Agent'}}</p>
<p>{{ $user->name }} has finished <strong>{{ $listing->address }} {{ $listing->city }}, {{ $listing->state }} {{ $listing->zip }}</strong> and your single-listing website is ready!</p>
<p>To review and unlock your single listing website, click this link and enter this password.</p>
<p><strong>Website:</strong> <a href="{{ env('APP_URL', 'https://tours.agentimpress.me') }}/listing/{{ $listing->token }}">{{ env('APP_URL', 'https://tours.agentimpress.me') }}/listing/{{ $listing->token }}</a></p>
<p><strong>Password:</strong> {{ $listing->password }}</p>
<p>Once you enter the password, you'll be able to review it and pay the invoice. Once the invoice has been paid, the watermarks will instantly be removed and the site is yours.</p>
<p>Now get out there and sell this listing!</p>
<p>If you love what you see... feel free to check out our additional options at <a href="https://agentimpress.me">agentimpress.me</a></p>
<p>The <a href="https://agentimpress.me">agentimpress.me</a> Team</p>
<hr>
<p>Confidential and Privileged Communication: This electronic mail transmission, and any documents, files or previous e-mail messages attached to it, may contain confidential information that is legally privileged. If you are not the intended recipient, or person responsible for delivering it to the intended recipient you are hereby notified that any disclosure, copying, distribution or use of any of the information contained in or attached to this message is strictly prohibited. Interception of e-mail is a crime under the Electronic Communications Privacy Act, 18 U.S.C. 2510-2521and 2107 2709. If you have received this transmission in error, please immediately notify us by replying to this e-mail or by calling us and destroy the original transmission and its attachments without reading them or saving them to disk.</p>
</html>