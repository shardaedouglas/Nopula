<?php
/**
 * Services Overview Page Template
 *
 * @package Nopula_SaaS
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Services Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="fade-in-up">Our Custom Software Services</h1>
            <p class="fade-in-up">Comprehensive development solutions tailored to your business needs</p>
            <div class="fade-in-up">
                <a href="#contact" class="btn btn-primary btn-lg">Get Started</a>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-secondary btn-lg">View Our Work</a>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section id="services" class="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Comprehensive Software Solutions</h2>
                <p>From web development to AI solutions, we deliver custom software that drives growth</p>
            </div>
            
            <div class="services-grid">
                <a href="<?php echo esc_url(home_url('/web-development')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦/⟩</div>
                    <h3>Web Development</h3>
                    <p>Custom websites, web applications, and progressive web apps built with modern frameworks like React, Angular, and Vue.js.</p>
                    <div class="service-features">
                        <small>✓ Modern frameworks & libraries</small><br>
                        <small>✓ Responsive design & mobile-first</small><br>
                        <small>✓ Performance optimization</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/enterprise-software')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦◉⟩</div>
                    <h3>Enterprise Software</h3>
                    <p>Custom ERP, CRM, and business management systems built to handle complex enterprise workflows and scale with your growth.</p>
                    <div class="service-features">
                        <small>✓ Scalable architecture design</small><br>
                        <small>✓ Enterprise security & compliance</small><br>
                        <small>✓ Legacy system integration</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/ecommerce-solutions')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦$⟩</div>
                    <h3>E-commerce Solutions</h3>
                    <p>Complete e-commerce platforms with payment integration, inventory management, and seamless shopping experiences.</p>
                    <div class="service-features">
                        <small>✓ Payment gateway integration</small><br>
                        <small>✓ Inventory management systems</small><br>
                        <small>✓ Mobile commerce optimization</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/ai-machine-learning')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦AI⟩</div>
                    <h3>AI & Machine Learning</h3>
                    <p>AI-powered solutions to automate processes, gain insights from data, and enhance business operations with intelligent systems.</p>
                    <div class="service-features">
                        <small>✓ Process automation & optimization</small><br>
                        <small>✓ Predictive analytics & insights</small><br>
                        <small>✓ Natural language processing</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/cloud-applications')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦☁⟩</div>
                    <h3>Cloud Applications</h3>
                    <p>Scalable cloud applications and infrastructure solutions built for modern business needs and global accessibility.</p>
                    <div class="service-features">
                        <small>✓ Cloud-native architecture</small><br>
                        <small>✓ Auto-scaling & load balancing</small><br>
                        <small>✓ Multi-cloud deployment</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/mobile-development')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦📱⟩</div>
                    <h3>Mobile Development</h3>
                    <p>Native and cross-platform mobile applications for iOS and Android with seamless user experiences and offline capabilities.</p>
                    <div class="service-features">
                        <small>✓ Native iOS & Android apps</small><br>
                        <small>✓ Cross-platform development</small><br>
                        <small>✓ Offline functionality</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/system-integration')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦⚙⟩</div>
                    <h3>System Integration</h3>
                    <p>Connect and integrate disparate systems to streamline workflows and improve data flow across your organization.</p>
                    <div class="service-features">
                        <small>✓ API development & integration</small><br>
                        <small>✓ Legacy system modernization</small><br>
                        <small>✓ Real-time data synchronization</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/data-analytics')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦📊⟩</div>
                    <h3>Data Analytics & Insights</h3>
                    <p>Transform your data into actionable insights with advanced analytics and business intelligence solutions.</p>
                    <div class="service-features">
                        <small>✓ Business intelligence dashboards</small><br>
                        <small>✓ Data visualization & reporting</small><br>
                        <small>✓ Predictive analytics</small>
                    </div>
                </a>
                
                <a href="<?php echo esc_url(home_url('/it-solutions')); ?>" class="feature-card card fade-in-up">
                    <div class="feature-icon">⟦🛠⟩</div>
                    <h3>IT Solutions</h3>
                    <p>Comprehensive IT solutions including infrastructure management, security, and technical support services.</p>
                    <div class="service-features">
                        <small>✓ Infrastructure management</small><br>
                        <small>✓ Cybersecurity & compliance</small><br>
                        <small>✓ 24/7 technical support</small>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Why Choose Nopula?</h2>
                <p>We deliver exceptional results through expertise, innovation, and dedication</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon-small">🚀</div>
                    <h4>Fast Delivery</h4>
                    <p>Agile development methodology ensuring rapid delivery without compromising quality or functionality.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-small">🎯</div>
                    <h4>Custom Solutions</h4>
                    <p>Tailored solutions designed specifically for your unique business requirements and objectives.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-small">🔒</div>
                    <h4>Secure & Scalable</h4>
                    <p>Built with security-first principles and designed to scale with your business growth and expansion.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-small">💡</div>
                    <h4>Innovation Focus</h4>
                    <p>Leveraging cutting-edge technologies and best practices to deliver innovative solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="cta">
        <div class="container text-center">
            <h2>Ready to transform your business with custom software?</h2>
            <p>Let's discuss your project requirements and create something amazing together.</p>
            <div style="margin-top: var(--spacing-xl);">
                <a href="mailto:hello@nopula.com" class="btn btn-primary btn-lg">Start Your Project</a>
                <a href="tel:+15551234567" class="btn btn-secondary btn-lg">Call Us Now</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>