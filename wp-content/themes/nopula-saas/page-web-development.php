<?php
/**
 * Web Development Service Page Template
 *
 * @package Nopula_SaaS
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Service Hero Section -->
    <section class="service-hero">
        <div class="container">
            <div class="service-hero-content">
                <div class="service-icon-large">⟦/⟩</div>
                <h1 class="fade-in-up">Web Development</h1>
                <p class="fade-in-up">Custom websites, web applications, and progressive web apps built with modern frameworks like React, Angular, and Vue.js. Our web development services include responsive design, performance optimization, and seamless user experiences that drive conversions and engagement.</p>
                <div class="fade-in-up">
                    <a href="#contact" class="btn btn-primary btn-lg">Get Started</a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-secondary btn-lg">View All Services</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Features -->
    <section class="service-features">
        <div class="container">
            <div class="text-center mb-5">
                <h2>What We Deliver</h2>
                <p>Comprehensive web development solutions tailored to your specific business needs</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon-small">⚡</div>
                    <h4>Modern Frameworks</h4>
                    <p>Built with React, Angular, Vue.js, and other cutting-edge frameworks for optimal performance.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-small">📱</div>
                    <h4>Responsive Design</h4>
                    <p>Mobile-first approach ensuring your website looks perfect on all devices and screen sizes.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-small">🚀</div>
                    <h4>Performance Optimization</h4>
                    <p>Fast loading times and smooth user experiences that keep visitors engaged.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-small">🔒</div>
                    <h4>Secure & Scalable</h4>
                    <p>Built with security-first principles and designed to scale with your business growth.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Applications -->
    <section class="service-applications">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Applications & Use Cases</h2>
                <p>Real-world applications and benefits of our Web Development services</p>
            </div>
            
            <div class="applications-grid">
                <div class="application-card">
                    <div class="application-header">
                        <div class="application-icon">🌐</div>
                        <h4>Corporate Websites</h4>
                    </div>
                    <p>Professional, responsive websites that represent your brand and drive engagement with modern design and seamless functionality.</p>
                    <div class="application-benefits">
                        <span class="benefit-tag">Responsive Design</span>
                        <span class="benefit-tag">SEO Optimized</span>
                        <span class="benefit-tag">Fast Loading</span>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-header">
                        <div class="application-icon">📱</div>
                        <h4>Web Applications</h4>
                    </div>
                    <p>Interactive web applications with advanced functionality, user management, and real-time features for enhanced user experience.</p>
                    <div class="application-benefits">
                        <span class="benefit-tag">User Authentication</span>
                        <span class="benefit-tag">Database Integration</span>
                        <span class="benefit-tag">Real-time Updates</span>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-header">
                        <div class="application-icon">⚡</div>
                        <h4>Progressive Web Apps</h4>
                    </div>
                    <p>App-like web experiences that work offline, provide push notifications, and deliver native app features through web technology.</p>
                    <div class="application-benefits">
                        <span class="benefit-tag">Offline Functionality</span>
                        <span class="benefit-tag">Push Notifications</span>
                        <span class="benefit-tag">App-like Experience</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Stack -->
    <section class="service-tech-stack">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Technology Stack</h2>
                <p>Cutting-edge technologies and tools we use for Web Development</p>
            </div>
            
            <div class="tech-grid">
                <div class="tech-item">
                    <div class="tech-icon">⚛️</div>
                    <h5>React</h5>
                    <p>Modern frontend framework for building interactive user interfaces</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">🔷</div>
                    <h5>Angular</h5>
                    <p>Enterprise-grade framework for large-scale applications</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">💚</div>
                    <h5>Vue.js</h5>
                    <p>Progressive JavaScript framework for building user interfaces</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">🟨</div>
                    <h5>Node.js</h5>
                    <p>Server-side JavaScript runtime for scalable applications</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">🔵</div>
                    <h5>TypeScript</h5>
                    <p>Type-safe JavaScript for better development experience</p>
                </div>
                
                <div class="tech-item">
                    <div class="tech-icon">🎨</div>
                    <h5>CSS3 & SASS</h5>
                    <p>Modern styling with preprocessors for maintainable code</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Process -->
    <section class="service-process">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Our Development Process</h2>
                <p>How we bring your web vision to life</p>
            </div>
            
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h4>Discovery & Planning</h4>
                    <p>We start by understanding your business goals, target audience, and technical requirements to create a comprehensive web development plan.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h4>Design & Prototyping</h4>
                    <p>Our design team creates wireframes, mockups, and interactive prototypes to visualize your website before development begins.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h4>Development & Testing</h4>
                    <p>We build your website using modern frameworks with continuous testing, code reviews, and quality assurance throughout the process.</p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h4>Launch & Optimization</h4>
                    <p>We deploy your website and provide ongoing optimization, maintenance, and support to ensure peak performance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="cta">
        <div class="container text-center">
            <h2>Ready to build your next web project?</h2>
            <p>Let's discuss your web development requirements and create something amazing together.</p>
            <div style="margin-top: var(--spacing-xl);">
                <a href="mailto:hello@nopula.com" class="btn btn-primary btn-lg">Start Your Project</a>
                <a href="tel:+15551234567" class="btn btn-secondary btn-lg">Call Us Now</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>