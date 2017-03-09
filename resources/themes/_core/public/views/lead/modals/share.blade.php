<div class="modal fade" id="listing-share" tabindex="-1" role="dialog" aria-labelledby="listing-share">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Share Via Email</strong>
                <form action="{{ route('lead.share') }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="listing_id" id="listing-id">
                    <input type="hidden" name="listing_url" id="listing-url">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" placeholder="email@domain.com" class="form-control typeahead" name="emails" id="share-email">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Email <i class="fa fa-share"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <strong>Share Via Social Networks</strong>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="social-share">
                            <ul class="list-group pull-left">
                                <li class="list-group-item">
                                    <a class="socialpop facebook" id="facebook-share" data-placement="right" title="Share on Facebook" data-type="facebook" href="http://www.facebook.com/sharer.php?u="><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="list-group-item">
                                    <a class="socialpop google" id="google-share" data-placement="right" title="Share on Google +" data-type="google" href="https://plus.google.com/share?url="><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li class="list-group-item">
                                    <a class="socialpop linkedin" id="linkedin-share" data-placement="right" title="Share on LinkedIn" data-type="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url="><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li class="list-group-item">
                                    <a class="socialpop twitter" id="twitter-share" data-placement="right" title="Share on Twitter" data-type="twitter" href="http://twitter.com/home?status=Check+out+this+house+from+{{ $user->name }}%21+"><i class="fa fa-twitter"></i></a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                @push('scripts')
                <script>
                    $('.socialpop').click(function (event) {
                        event.preventDefault();
                        window.open($(this).attr("href"), "popupWindow", "width=550,height=600,scrollbars=yes");
                    });
                </script>
                @endpush
            </div>
        </div>
    </div>
</div>