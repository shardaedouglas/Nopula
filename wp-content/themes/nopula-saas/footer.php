<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3><?php bloginfo('name'); ?></h3>
                <p>Custom software development for businesses of all sizes. From startups to enterprise corporations, we build tailored solutions that drive growth.</p>
                <div style="margin-top: var(--spacing-lg);">
                    <a href="https://twitter.com/nopulatech" style="margin-right: var(--spacing-md);">Twitter</a>
                    <a href="https://linkedin.com/company/nopula" style="margin-right: var(--spacing-md);">LinkedIn</a>
                    <a href="mailto:shardae@nopula.com">Contact</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Services</h3>
                <a href="<?php echo esc_url(home_url('/web-development')); ?>">Web Development</a>
                <a href="<?php echo esc_url(home_url('/enterprise-software')); ?>">Enterprise Software</a>
                <a href="<?php echo esc_url(home_url('/ecommerce-solutions')); ?>">E-commerce Solutions</a>
                <a href="<?php echo esc_url(home_url('/ai-machine-learning')); ?>">AI & Machine Learning</a>
                <a href="<?php echo esc_url(home_url('/cloud-applications')); ?>">Cloud Applications</a>
                <a href="<?php echo esc_url(home_url('/mobile-development')); ?>">Mobile Development</a>
                <a href="<?php echo esc_url(home_url('/system-integration')); ?>">System Integration</a>
                <a href="<?php echo esc_url(home_url('/data-analytics')); ?>">Data Analytics</a>
                <a href="<?php echo esc_url(home_url('/it-solutions')); ?>">IT Solutions</a>
            </div>
            
            <div class="footer-section">
                <h3>Technologies</h3>
                <a href="#technologies">C# & .NET</a>
                <a href="#technologies">JavaScript</a>
                <a href="#technologies">Python</a>
                <a href="#technologies">React</a>
                <a href="#technologies">Angular</a>
                <a href="#technologies">Cloud Platforms</a>
            </div>
            
            <div class="footer-section">
                <h3>Company</h3>
                <a href="#testimonials">Client Testimonials</a>
                <a href="#contact">Contact Us</a>
                <a href="#case-studies">Case Studies</a>
                <a href="#development-process">Our Process</a>
                <a href="mailto:hello@nopula.com">Get In Touch</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; Copyright <?php echo date('Y'); ?> · <?php bloginfo('name'); ?> · All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
