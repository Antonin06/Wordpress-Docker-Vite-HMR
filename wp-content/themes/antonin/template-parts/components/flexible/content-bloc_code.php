<?php if($args): ?>
<section class="code-bloc">
    <div class="aa-pre-block">
        <div class="pre-block-header">
            <span class="language-<?php echo $args['language_code']; ?>"><?php echo $args['language_code']; ?></span>
            <span class="copy">
                    <svg width="46" height="46" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 6.75H7.75a2 2 0 0 0-2 2v8.5a2 2 0 0 0 2 2h8.5a2 2 0 0 0 2-2v-8.5a2 2 0 0 0-2-2H15"></path>
                        <path d="M14 8.25h-4a1 1 0 0 1-1-1v-1.5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1.5a1 1 0 0 1-1 1Z"></path>
                        <path d="M9.75 12.25h4.5"></path>
                        <path d="M9.75 15.25h4.5"></path>
                    </svg>
                </span>
        </div>
        <pre class="language-<?php echo $args['language_code']; ?> line-numbers"><code><?php echo $code; ?></code></pre>
    </div>
</section>
<?php endif; ?>