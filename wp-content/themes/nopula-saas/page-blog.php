<?php
/**
 * Blog Page Template
 *
 * @package Nopula_SaaS
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Blog Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <div class="text-center">
                <h1 class="fade-in-up">Nopula Tech Blog</h1>
                <p class="fade-in-up">Insights, trends, and expertise in software development, technology, and business innovation.</p>
            </div>
        </div>
    </section>

    <!-- Blog Categories -->
    <section class="blog-categories">
        <div class="container">
            <div class="category-filters">
                <button class="category-btn active" data-category="all">All</button>
                <button class="category-btn" data-category="software-development">Software Development</button>
                <button class="category-btn" data-category="technology">Technology</button>
                <button class="category-btn" data-category="business">Business</button>
                <button class="category-btn" data-category="ai-ml">AI & ML</button>
                <button class="category-btn" data-category="case-studies">Case Studies</button>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section id="main-blog" class="blog-posts">
        <div class="container">
            <div class="blog-grid">
                
                <!-- Featured Post -->
                <article class="blog-post featured-post fade-in-up" data-category="ai-ml">
                    <div class="post-image">
                        <div class="post-category">AI & ML</div>
                    </div>
                    <div class="post-content">
                        <h2>The Future of AI in Enterprise Software Development</h2>
                        <p>Explore how artificial intelligence is revolutionizing enterprise software development, from automated code generation to intelligent testing and deployment strategies that are transforming how businesses build and scale their applications.</p>
                        <div class="post-meta">
                            <span class="post-date">Dec 15, 2024</span>
                            <span class="read-time">8 min read</span>
                        </div>
                        <a href="#" class="read-more">Read Full Article</a>
                    </div>
                </article>

                <!-- Regular Posts -->
                <article class="blog-post fade-in-up" data-category="software-development">
                    <div class="post-image">
                        <div class="post-category">Software Development</div>
                    </div>
                    <div class="post-content">
                        <h3>Building Scalable Microservices Architecture</h3>
                        <p>Learn the essential principles and best practices for designing and implementing microservices that can scale with your business growth while maintaining performance and reliability.</p>
                        <div class="post-meta">
                            <span class="post-date">Dec 12, 2024</span>
                            <span class="read-time">6 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

                <article class="blog-post fade-in-up" data-category="technology">
                    <div class="post-image">
                        <div class="post-category">Technology</div>
                    </div>
                    <div class="post-content">
                        <h3>Cloud-Native Development: Best Practices for 2024</h3>
                        <p>Discover the latest trends and strategies in cloud-native development, including containerization, serverless architecture, and DevOps practices that are shaping the future of software deployment.</p>
                        <div class="post-meta">
                            <span class="post-date">Dec 10, 2024</span>
                            <span class="read-time">7 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

                <article class="blog-post fade-in-up" data-category="business">
                    <div class="post-image">
                        <div class="post-category">Business</div>
                    </div>
                    <div class="post-content">
                        <h3>Digital Transformation Strategies for Mid-Market Companies</h3>
                        <p>How mid-market companies can successfully navigate digital transformation initiatives, including technology selection, change management, and ROI measurement strategies.</p>
                        <div class="post-meta">
                            <span class="post-date">Dec 8, 2024</span>
                            <span class="read-time">5 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

                <article class="blog-post fade-in-up" data-category="case-studies">
                    <div class="post-image">
                        <div class="post-category">Case Studies</div>
                    </div>
                    <div class="post-content">
                        <h3>How We Built a Real-Time Trading Platform</h3>
                        <p>An in-depth look at the technical challenges and solutions involved in developing a high-performance trading platform with sub-millisecond latency and 99.99% uptime.</p>
                        <div class="post-meta">
                            <span class="post-date">Dec 5, 2024</span>
                            <span class="read-time">10 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

                <article class="blog-post fade-in-up" data-category="ai-ml">
                    <div class="post-image">
                        <div class="post-category">AI & ML</div>
                    </div>
                    <div class="post-content">
                        <h3>Machine Learning in Healthcare: Ethical Considerations</h3>
                        <p>Exploring the ethical implications of implementing machine learning solutions in healthcare, including data privacy, algorithmic bias, and regulatory compliance considerations.</p>
                        <div class="post-meta">
                            <span class="post-date">Dec 3, 2024</span>
                            <span class="read-time">9 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

                <article class="blog-post fade-in-up" data-category="software-development">
                    <div class="post-image">
                        <div class="post-category">Software Development</div>
                    </div>
                    <div class="post-content">
                        <h3>API Design Patterns for Modern Applications</h3>
                        <p>Essential API design patterns and best practices for building robust, scalable, and maintainable APIs that serve modern web and mobile applications.</p>
                        <div class="post-meta">
                            <span class="post-date">Nov 30, 2024</span>
                            <span class="read-time">6 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

                <article class="blog-post fade-in-up" data-category="technology">
                    <div class="post-image">
                        <div class="post-category">Technology</div>
                    </div>
                    <div class="post-content">
                        <h3>Cybersecurity Best Practices for SaaS Applications</h3>
                        <p>Comprehensive guide to implementing security measures in SaaS applications, covering authentication, data encryption, and compliance requirements.</p>
                        <div class="post-meta">
                            <span class="post-date">Nov 28, 2024</span>
                            <span class="read-time">8 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

                <article class="blog-post fade-in-up" data-category="business">
                    <div class="post-image">
                        <div class="post-category">Business</div>
                    </div>
                    <div class="post-content">
                        <h3>Startup Tech Stack Selection: A Founder's Guide</h3>
                        <p>How startup founders can make informed decisions about their technology stack, balancing cost, scalability, and development speed considerations.</p>
                        <div class="post-meta">
                            <span class="post-date">Nov 25, 2024</span>
                            <span class="read-time">7 min read</span>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>

            </div>

            <!-- Load More Button -->
            <div class="text-center" style="margin-top: var(--spacing-4xl);">
                <button class="btn btn-primary btn-lg">Load More Articles</button>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="newsletter-signup">
        <div class="container text-center">
            <h2>Stay Updated with Nopula Tech</h2>
            <p>Get the latest insights on software development, technology trends, and business innovation delivered to your inbox.</p>
            <div class="newsletter-form">
                <input type="email" placeholder="Enter your email address" class="email-input">
                <button class="btn btn-primary">Subscribe</button>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
