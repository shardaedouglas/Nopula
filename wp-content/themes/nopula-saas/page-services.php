<?php
/**
 * Services Page Template
 * Handles all service types via URL parameters
 *
 * @package Nopula_SaaS
 */

get_header(); 

// Get the service type from URL or default to overview
$service_type = isset($_GET['service']) ? sanitize_text_field($_GET['service']) : 'overview';
$service_data = array();

// Define service data
$services = array(
    'overview' => array(
        'title' => 'Our Services',
        'description' => 'Comprehensive technology solutions to transform your business and drive growth.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Web Development', 'Enterprise Software', 'E-commerce Solutions',
            'AI & Machine Learning', 'Cloud Applications', 'Mobile Development',
            'System Integration', 'Data Analytics', 'IT Solutions'
        )
    ),
    'web-development' => array(
        'title' => 'Web Development',
        'description' => 'Custom websites and web applications built with modern technologies and best practices.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Responsive Design', 'Performance Optimization', 'SEO Integration',
            'Content Management', 'E-commerce Integration', 'API Development'
        ),
        'applications' => array(
            'Corporate Websites', 'E-commerce Platforms', 'Web Applications',
            'Portals & Dashboards', 'Content Management', 'Progressive Web Apps'
        ),
        'tech' => array('React', 'Node.js', 'PHP', 'WordPress', 'MySQL', 'AWS')
    ),
    'enterprise-software' => array(
        'title' => 'Enterprise Software',
        'description' => 'Custom ERP, CRM, and business management systems for enterprise-scale operations.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Scalable Architecture', 'Enterprise Security', 'Legacy Integration',
            'Advanced Reporting', 'Multi-User Management', 'Performance Optimization'
        ),
        'applications' => array(
            'ERP Systems', 'CRM Platforms', 'Supply Chain Management',
            'Financial Systems', 'HR Management', 'Business Intelligence'
        ),
        'tech' => array('C# .NET', 'Java', 'Laravel', 'PostgreSQL', 'SQL Server', 'Azure')
    ),
    'ecommerce-solutions' => array(
        'title' => 'E-commerce Solutions',
        'description' => 'Custom online stores and marketplace platforms that drive sales and customer engagement.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Advanced Shopping Cart', 'Payment Integration', 'Inventory Management',
            'Shipping & Fulfillment', 'Analytics & Reporting', 'Search & Filtering'
        ),
        'applications' => array(
            'Online Retail', 'Multi-Vendor Marketplaces', 'Mobile Commerce',
            'Subscription Commerce', 'B2B E-commerce', 'Global E-commerce'
        ),
        'tech' => array('React', 'Node.js', 'WooCommerce', 'MongoDB', 'Stripe', 'Shopify')
    ),
    'ai-machine-learning' => array(
        'title' => 'AI & Machine Learning',
        'description' => 'Intelligent solutions powered by artificial intelligence and machine learning technologies.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Predictive Analytics', 'Natural Language Processing', 'Computer Vision',
            'Recommendation Systems', 'Automated Decision Making', 'Chatbot Development'
        ),
        'applications' => array(
            'Predictive Analytics', 'Intelligent Automation', 'Personalization',
            'Fraud Detection', 'Computer Vision', 'Natural Language Processing'
        ),
        'tech' => array('Python', 'TensorFlow', 'PyTorch', 'AWS ML', 'Azure AI', 'Google AI')
    ),
    'cloud-applications' => array(
        'title' => 'Cloud Applications',
        'description' => 'Scalable cloud-native applications built for modern digital infrastructure.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Cloud-Native Architecture', 'Auto-Scaling', 'Cloud Security',
            'DevOps & CI/CD', 'Monitoring & Analytics', 'Cost Optimization'
        ),
        'applications' => array(
            'SaaS Platforms', 'Mobile Backend', 'API Gateway Services',
            'Data Processing', 'AI/ML Cloud Services', 'Microservices'
        ),
        'tech' => array('AWS', 'Azure', 'Docker', 'Kubernetes', 'Terraform', 'CloudWatch')
    ),
    'mobile-development' => array(
        'title' => 'Mobile Development',
        'description' => 'Native and cross-platform mobile applications for iOS and Android platforms.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Cross-Platform Development', 'Native UI/UX', 'Mobile Security',
            'Offline Functionality', 'Push Notifications', 'Performance Optimization'
        ),
        'applications' => array(
            'E-commerce Apps', 'Healthcare Apps', 'Fintech Apps',
            'E-learning Apps', 'Transportation Apps', 'Real Estate Apps'
        ),
        'tech' => array('React Native', 'Flutter', 'Swift', 'Kotlin', 'Firebase', 'AWS Amplify')
    ),
    'system-integration' => array(
        'title' => 'System Integration',
        'description' => 'Seamlessly connect your existing systems and applications for unified operations.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'API Development', 'Data Synchronization', 'Workflow Automation',
            'Security & Compliance', 'Monitoring & Analytics', 'Legacy Modernization'
        ),
        'applications' => array(
            'Enterprise Integration', 'E-commerce Integration', 'Healthcare Integration',
            'Financial Integration', 'Manufacturing Integration', 'Cloud Migration'
        ),
        'tech' => array('REST APIs', 'Kafka', 'MuleSoft', 'Python', 'ETL Tools', 'Cloud Services')
    ),
    'data-analytics' => array(
        'title' => 'Data Analytics & Insights',
        'description' => 'Transform your data into actionable insights with advanced analytics and business intelligence.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Business Intelligence', 'Data Mining', 'Predictive Analytics',
            'Data Warehouse', 'Real-time Analytics', 'Custom Reporting'
        ),
        'applications' => array(
            'Financial Analytics', 'E-commerce Analytics', 'Healthcare Analytics',
            'Manufacturing Analytics', 'Marketing Analytics', 'Operational Analytics'
        ),
        'tech' => array('Python', 'Tableau', 'Power BI', 'Spark', 'TensorFlow', 'PostgreSQL')
    ),
    'it-solutions' => array(
        'title' => 'IT Solutions',
        'description' => 'Comprehensive IT infrastructure, support, and consulting services for business continuity.',
        'icon' => '⟦◉⟩',
        'features' => array(
            'Cybersecurity', 'Network Infrastructure', 'Cloud Migration',
            'Data Backup & Recovery', 'IT Support', 'IT Strategy'
        ),
        'applications' => array(
            'Enterprise IT', 'Healthcare IT', 'Educational IT',
            'Manufacturing IT', 'Financial IT', 'Small Business IT'
        ),
        'tech' => array('Windows/Linux', 'Network Equipment', 'Cloud Platforms', 'Security Tools', 'Backup Solutions', 'Monitoring Tools')
    )
);

$current_service = isset($services[$service_type]) ? $services[$service_type] : $services['overview'];
?>

<main id="main" class="site-main">
    <!-- Service Hero Section -->
    <section class="service-hero">
        <div class="container">
            <div class="service-hero-content">
                <div class="service-icon-large">
                    <div class="service-icon"><?php echo $current_service['icon']; ?></div>
                </div>
                <div class="service-hero-text">
                    <h1 class="fade-in-up"><?php echo $current_service['title']; ?></h1>
                    <p class="fade-in-up"><?php echo $current_service['description']; ?></p>
                    <div class="fade-in-up">
                        <a href="#contact" class="btn btn-primary btn-lg">Start Your Project</a>
                        <a href="#features" class="btn btn-secondary btn-lg">View Features</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($service_type !== 'overview'): ?>
    <!-- Service Features Section -->
    <section id="features" class="service-features">
        <div class="container">
            <div class="text-center mb-5">
                <h2>What's Included</h2>
                <p>Comprehensive features and capabilities that come with our <?php echo $current_service['title']; ?> service</p>
            </div>
            
            <div class="features-grid">
                <?php foreach ($current_service['features'] as $feature): ?>
                <div class="feature-item card fade-in-up">
                    <div class="feature-icon-small">
                        <div class="icon">⚡</div>
                    </div>
                    <h3><?php echo $feature; ?></h3>
                    <p>Advanced <?php echo strtolower($feature); ?> capabilities designed to enhance your business operations and drive growth.</p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Applications Section -->
    <?php if (isset($current_service['applications'])): ?>
    <section class="service-applications">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Applications & Use Cases</h2>
                <p>Real-world applications and industries that benefit from our <?php echo $current_service['title']; ?> solutions</p>
            </div>
            
            <div class="applications-grid">
                <?php foreach ($current_service['applications'] as $application): ?>
                <div class="application-card card fade-in-up">
                    <div class="application-header">
                        <div class="application-icon">🎯</div>
                        <h3><?php echo $application; ?></h3>
                    </div>
                    <p>Specialized <?php echo strtolower($application); ?> solutions tailored to meet specific industry requirements and business objectives.</p>
                    <div class="application-benefits">
                        <span class="benefit-tag">Custom Solution</span>
                        <span class="benefit-tag">Industry Focused</span>
                        <span class="benefit-tag">Scalable</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Technology Stack Section -->
    <?php if (isset($current_service['tech'])): ?>
    <section class="service-tech-stack">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Technology Stack</h2>
                <p>Modern technologies and frameworks we use for <?php echo $current_service['title']; ?> projects</p>
            </div>
            
            <div class="tech-grid">
                <?php foreach ($current_service['tech'] as $tech): ?>
                <div class="tech-item fade-in-up">
                    <div class="tech-icon">🔧</div>
                    <h4><?php echo $tech; ?></h4>
                    <p>Industry-leading <?php echo strtolower($tech); ?> technology for robust, scalable, and efficient solutions.</p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Process Section -->
    <section class="service-process">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Our Development Process</h2>
                <p>How we deliver exceptional <?php echo $current_service['title']; ?> solutions</p>
            </div>
            
            <div class="process-steps">
                <div class="process-step fade-in-up">
                    <div class="step-number">01</div>
                    <h4>Analysis & Planning</h4>
                    <p>We analyze your requirements and design the optimal solution architecture for your specific needs.</p>
                </div>
                <div class="process-step fade-in-up">
                    <div class="step-number">02</div>
                    <h4>Design & Development</h4>
                    <p>Our team designs and develops your solution using industry best practices and modern technologies.</p>
                </div>
                <div class="process-step fade-in-up">
                    <div class="step-number">03</div>
                    <h4>Testing & Quality Assurance</h4>
                    <p>Comprehensive testing ensures your solution meets quality standards and performs reliably.</p>
                </div>
                <div class="process-step fade-in-up">
                    <div class="step-number">04</div>
                    <h4>Deployment & Support</h4>
                    <p>We deploy your solution and provide ongoing support to ensure optimal performance and growth.</p>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
    <!-- Services Overview -->
    <section id="features" class="service-features">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Our Services</h2>
                <p>Comprehensive technology solutions to transform your business</p>
            </div>
            
            <div class="features-grid">
                <?php 
                $service_links = array(
                    'web-development' => 'Web Development',
                    'enterprise-software' => 'Enterprise Software',
                    'ecommerce-solutions' => 'E-commerce Solutions',
                    'ai-machine-learning' => 'AI & Machine Learning',
                    'cloud-applications' => 'Cloud Applications',
                    'mobile-development' => 'Mobile Development',
                    'system-integration' => 'System Integration',
                    'data-analytics' => 'Data Analytics',
                    'it-solutions' => 'IT Solutions'
                );
                
                foreach ($service_links as $slug => $title): 
                    $service_info = $services[$slug];
                ?>
                <div class="feature-item card fade-in-up">
                    <div class="feature-icon-small">
                        <div class="icon"><?php echo $service_info['icon']; ?></div>
                    </div>
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $service_info['description']; ?></p>
                    <a href="?service=<?php echo $slug; ?>" class="btn btn-primary">Learn More</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA Section -->
    <section id="contact" class="cta">
        <div class="container text-center">
            <h2>Ready to get started with <?php echo $current_service['title']; ?>?</h2>
            <p>Let's discuss your project requirements and create something amazing together.</p>
            <div style="margin-top: var(--spacing-xl);">
                <a href="mailto:shardae@nopula.com" class="btn btn-primary btn-lg">Start Your Project</a>
                <a href="tel:+15551234567" class="btn btn-secondary btn-lg">Call Us Now</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>