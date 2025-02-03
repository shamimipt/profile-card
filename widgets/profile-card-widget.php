<?php

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	die();
}

/**
 * profile card widget
 */
class Profile_Card_Widget extends Widget_Base {

	public function get_name() {
		return 'profile-card-widget';
	}

	public function get_title() {
		return 'Profile Card';
	}

	public function get_icon() {
		return 'eicon-parallax'; // Icon for your widget
	}

	public function get_categories() {
		return [ 'extrawidgets' ];
	}

	// register controls
	protected function register_controls() {

		// Section: Content
		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Icon', 'profile-card' ),
				'type'        => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid'   => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'profile-card' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Sarah Anderson', 'profile-card' ),
				'placeholder' => esc_html__( 'Type your title here', 'profile-card' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Sub Title', 'profile-card' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Senior Product Designer', 'profile-card' ),
				'placeholder' => esc_html__( 'Type your subtitle here', 'profile-card' ),
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'content',
			[
				'label'       => esc_html__( 'Content', 'profile-card' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Creative designer with 5+ years of experience in digital product design and brand identity', 'profile-card' ),
				'placeholder' => esc_html__( 'Type your content here', 'profile-card' ),
				'label_block' => true,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'list_number',
			[
				'label'       => esc_html__( 'Number', 'profile-card' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '1.2k', 'profile-card' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_title',
			[
				'label'       => esc_html__( 'Title', 'profile-card' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Projects', 'profile-card' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'stats_list',
			[
				'label'       => esc_html__( 'Repeater List', 'profile-card' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'list_number' => esc_html__( '1.2k', 'profile-card' ),
						'list_title'  => esc_html__( 'Projects', 'profile-card' ),
					],
					[
						'list_number' => esc_html__( '8.5k', 'profile-card' ),
						'list_title'  => esc_html__( 'Followers', 'profile-card' ),
					],
					[
						'list_number' => esc_html__( '4.7k', 'profile-card' ),
						'list_title'  => esc_html__( 'Following', 'profile-card' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'footer_section',
			[
				'label' => __( 'Footer', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'skill_title',
			[
				'label'       => esc_html__( 'Title', 'profile-card' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'UI/UX', 'profile-card' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'skills',
			[
				'label'       => esc_html__( 'Skills', 'profile-card' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'skill_title' => esc_html__( 'UI/UX', 'profile-card' ),
					],
					[
						'skill_title' => esc_html__( 'Branding', 'profile-card' ),
					],
					[
						'skill_title' => esc_html__( 'Motion', 'profile-card' ),
					],
				],
				'title_field' => '{{{ skill_title }}}',
			]
		);
		$this->add_control(
			'button_text_1',
			[
				'label'       => esc_html__( 'Button Text 1', 'profile-card' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Follow', 'profile-card' ),
				'placeholder' => esc_html__( 'Type your button text here', 'profile-card' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_url_1',
			[
				'label'       => esc_html__( 'Button URL 1', 'profile-card' ),
				'type'        => Controls_Manager::URL,
				'default'     => [
					'url'         => '#',
					'is_external' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_text_2',
			[
				'label'       => esc_html__( 'Button Text 2', 'profile-card' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Message', 'profile-card' ),
				'placeholder' => esc_html__( 'Type your button text here', 'profile-card' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_url_2',
			[
				'label'       => esc_html__( 'Button URL 2', 'profile-card' ),
				'type'        => Controls_Manager::URL,
				'default'     => [
					'url'         => '#',
					'is_external' => '',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		$this->_style_controls();
	}

	protected function _style_controls() {

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

        <div class="profile-card">
            <div class="card-content">
                <!-- Avatar Circle -->
                <div class="avatar-wrapper">
                    <div class="avatar">
                        <div class="avatar-inner"></div>
                        <div class="avatar-glow"></div>
                        <div class="avatar-border"></div>
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="profile-info">
                    <h2 class="name"><?php echo esc_html( $settings['title'] ); ?></h2>
                    <p class="title"><?php echo esc_html( $settings['subtitle'] ); ?></p>

                    <div class="stats">
						<?php
						$stats = $settings['stats_list'];
						foreach ( $stats as $stat ) :
							?>
                            <div class="stat">
                                <span class="stat-value"><?php echo esc_html( $stat['list_number'] ); ?></span>
                                <span class="stat-label"><?php echo esc_html( $stat['list_title'] ); ?></span>
                            </div>
						<?php endforeach; ?>
                    </div>

                    <div class="bio"><?php echo esc_html( $settings['content'] ); ?></div>

                    <div class="skills">
						<?php
						$skills = $settings['skills'];
						foreach ( $skills as $skill ) :
							?>
                            <span class="skill"><?php echo esc_html( $skill['skill_title'] ); ?></span>
						<?php endforeach; ?>
                    </div>

                    <div class="actions">
                        <button class="action-btn primary">
                            <span><?php echo esc_html( $settings['button_text_1'] ); ?></span>
                            <div class="btn-effect"></div>
                        </button>
                        <button class="action-btn secondary">
                            <span><?php echo esc_html( $settings['button_text_2'] ) ; ?></span>
                            <div class="btn-effect"></div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card Effects -->
            <div class="card-shine"></div>
            <div class="card-border"></div>
            <div class="card-glow"></div>
        </div>

		<?php
	}
}
