<amp-lightbox id="talk-info" layout="nodisplay" on="lightboxOpen: AMP.setState({bioTab: 'talk'})" scrollable>
    <div class='modal-background' role="button" tabindex="-1" on="tap:talk-info.close"></div>
    <amp-layout
        layout="intrinsic"
        width="600"
        height="800"
        class="bg-white modal shadow-lg"
        role="button"
        tabindex="0">
        <div class="close-button px2 py1 pointer white text-shadow" role="button" tabindex="0" on="tap:talk-info.close">x</div>
        <div class="modal-content flex flex-column justify-between">
            <section class="speaker-bio p3 bg-dark white flex-item" [class]="state.speakers[current].keynote ? 'bg-gold white' : 'bg-dark light'" [hidden]="!state.speakers[current].bio">
                <div class="flex flex-row">
                    <div class="col-6">
                        <amp-layout height=255 width=255 layout="responsive" class="bg-blue cloth relative">
                            <amp-img layout="fill"
                                     [src]="state.speakers[current].avatar"
                                     src="/images/logo.svg"
                                     width="255"
                                     height="255"
                                     class="object-cover object-right"
                                     alt="{{ name }}: {{#talk}}{{ talk }}{{/talk}}{{^talk}}To Be Announced{{/talk}}">

                                <amp-img alt="CascadiaPHP Logo"
                                         class="m2"
                                         fallback
                                         layout="responsive"
                                         width="765" height="78"
                                         src="/images/logo.svg"></amp-img>
                            </amp-img>
                        </amp-layout>
                    </div>
                    <div class="col-6 flex flex-column justify-between">
                        <div class="center pt2 flex flex-column flex-grow justify-center">
                                <span [class]="'light-text block nowrap' + (state.speakers[current].keynote ? 'white text-shadow' : '')"
                                      [text]="state.speakers[current].name"></span>
                            <span [class]="'light-text block nowrap rounded mx1 my1 overflow-hidden ' + (state.speakers[current].keynote ? 'white text-shadow bg-white black' : 'bg-blue white ')"
                                  [text]="state.speakers[current].company"
                                  [hidden]="!state.speakers[current].company">
                                </span>
                        </div>

                        <?php /** Social Icons */ ?>
                        <div class="mb1">
                            <ul class="social-icons list-reset flex justify-center items-center flex-wrap m0 mt2">
                                <li [hidden]="!state.speakers[current].twitter">
                                    <a [href]="'https://twitter.com/' + state.speakers[current].twitter" target="_blank" class="inline-block px1 flex" aria-label="Link to Twitter">
                                        <svg [class]="state.speakers[current].keynote ? 'f-white' : 'f-light'" xmlns="http://www.w3.org/2000/svg" width="24" height="22.2" viewBox="0 0 53 49"><title>Twitter</title><path d="M45 6.9c-1.6 1-3.3 1.6-5.2 2-1.5-1.6-3.6-2.6-5.9-2.6-4.5 0-8.2 3.7-8.2 8.3 0 .6.1 1.3.2 1.9-6.8-.4-12.8-3.7-16.8-8.7C8.4 9 8 10.5 8 12c0 2.8 1.4 5.4 3.6 6.9-1.3-.1-2.6-.5-3.7-1.1v.1c0 4 2.8 7.4 6.6 8.1-.7.2-1.5.3-2.2.3-.5 0-1 0-1.5-.1 1 3.3 4 5.7 7.6 5.7-2.8 2.2-6.3 3.6-10.2 3.6-.6 0-1.3-.1-1.9-.1 3.6 2.3 7.9 3.7 12.5 3.7 15.1 0 23.3-12.6 23.3-23.6 0-.3 0-.7-.1-1 1.6-1.2 3-2.7 4.1-4.3-1.4.6-3 1.1-4.7 1.3 1.7-1 3-2.7 3.6-4.6" class="ampstart-icon ampstart-icon-twitter"></path></svg>
                                    </a>
                                </li>
                                <li [hidden]="!state.speakers[current].github">
                                    <a href="https://github.com/phpdx/cascadiaphp.com" target="_blank" class="inline-block px1 flex" aria-label="Link Github">
                                        <svg [class]="state.speakers[current].keynote ? 'f-white' : 'f-light'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 64.000000 64.000000"><path d="M22.4 1.4C-.8 9-7.4 38.4 10.5 54.9 14.7 58.8 20.4 62 23 62c.5 0 1-1.6 1-3.5 0-3.3-.2-3.5-3.5-3.5-3.5 0-4.2-.5-9-6.6-4.4-5.6-2.3-6.2 3.2-.9 4.2 4 7.5 4.5 9.8 1.2 1.4-2.1 1.4-2.2-.7-3-6-2.3-8.8-4.2-10.2-7.2-2.1-4.3-2.1-12.4 0-15.3.8-1.2 1.2-2.7.9-3.2-1-1.6.5-7 1.8-7 .7 0 2.4.6 3.8 1.4 1.7.9 6 1.4 11.9 1.4s10.2-.5 11.9-1.4c1.4-.8 3.1-1.4 3.8-1.4 1.3 0 2.8 5.4 1.8 7-.3.5.1 2 .9 3.2 1.8 2.5 2.1 10.3.7 14.1-1.4 3.6-5 6.6-9.3 7.8-3.3.9-3.7 1.2-2.8 2.9.5 1 1 4.6 1 7.9 0 3.5.4 6.1 1 6.1 5.2 0 15.8-8.8 19.8-16.5 2.3-4.3 2.7-6.3 2.7-13.5 0-7-.4-9.4-2.4-13.5C57.9 12.2 51.8 6 45.6 3 39.6.2 28.5-.6 22.4 1.4z" class="ampstart-icon"></path></svg>
                                    </a>
                                </li>
                                <li [hidden]="!state.speakers[current].facebook">
                                    <a href="https://www.facebook.com/cascadiaconf" class="inline-block flex px1 text-shadow" target="_blank" aria-label="Link to Facebook">
                                        <svg [class]="state.speakers[current].keynote ? 'f-white' : 'f-light'" xmlns="http://www.w3.org/2000/svg" width="24" height="23.6" viewbox="0 0 56 55">
                                            <title>Facebook</title>
                                            <path d="M47.5 43c0 1.2-.9 2.1-2.1 2.1h-10V30h5.1l.8-5.9h-5.9v-3.7c0-1.7.5-2.9 3-2.9h3.1v-5.3c-.6 0-2.4-.2-4.6-.2-4.5 0-7.5 2.7-7.5 7.8v4.3h-5.1V30h5.1v15.1H10.7c-1.2 0-2.2-.9-2.2-2.1V8.3c0-1.2 1-2.2 2.2-2.2h34.7c1.2 0 2.1 1 2.1 2.2V43" class="ampstart-icon ampstart-icon-fb"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div [hidden]="!state.speakers[current].description || !state.speakers[current].bio" [class]="'tab-headers flex flex-row white ' + (state.speakers[current].keynote ? 'bg-gold' : 'bg-dark')">
                    <div role='tab' tabindex="0" on="tap:AMP.setState({bioTab: 'talk'})" [class]="(bioTab == 'talk') || !bioTab ? 'selected' : ''">Talk Info</div>
                    <div role="tab" tabindex="0" on="tap:AMP.setState({bioTab: 'bio'})" [class]="bioTab == 'bio' ? 'selected' : ''">Bio</div>
                </div>
            </section>
            <section class="talk-info p3 flex-item flex-grow overflow-auto">
                <div class="tab" [hidden]="(state.speakers[current].description == '') || (bioTab != 'talk')">
                    <h4 class="m0" [text]="state.speakers[current].talk"></h4>
                    <p [text]='state.speakers[current].description'></p>
                </div>
                <div class="tab" [hidden]="(bioTab != 'bio') && (state.speakers[current].description != '')">
                    <h4 class="m0" [text]="state.speakers[current].name"></h4>
                    <p [text]='state.speakers[current].bio'></p>
                </div>
            </section>
        </div>
    </amp-layout>
</amp-lightbox>
