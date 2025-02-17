<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
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

	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'image',
			[
				'label'   => esc_html__( 'Choose Image', 'profile-card' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
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
		$this->start_controls_section(
			'general_section',
			[
				'label' => esc_html__( 'General', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'profile-card' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .profile-card' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border-radius',
			[
				'label'      => esc_html__( 'Border Radius', 'profile-card' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .profile-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'padding',
			[
				'label'      => esc_html__( 'Padding', 'profile-card' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .profile-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'avatar_section',
			[
				'label' => esc_html__( 'Avatar', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'avatar_size',
			[
				'label'      => esc_html__( 'Size', 'profile-card' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range'      => [
					'px' => [
						'min'  => 50,
						'max'  => 200,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .avatar' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'avatar_border_size',
			[
				'label'      => esc_html__( 'Border Size', 'profile-card' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 20,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .avatar-border' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'avatar_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'profile-card' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .avatar-border' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .name',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'grad_color',
				'types'    => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .name',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_section',
			[
				'label' => esc_html__( 'Sub Title', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .title',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Color', 'profile-card' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'stats_value_section',
			[
				'label' => esc_html__( 'Stats Value', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'stats_color',
				'types'    => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .stat-value',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'stats_typography',
				'selector' => '{{WRAPPER}} .stat-value',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'stats_label_section',
			[
				'label' => esc_html__( 'Stats Label', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'stats_label',
			[
				'label'     => esc_html__( 'Color', 'profile-card' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stat-label' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'stats_label_typography',
				'selector' => '{{WRAPPER}} .stat-label',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'content__section',
			[
				'label' => esc_html__( 'Content', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_color',
			[
				'label'     => esc_html__( 'Color', 'profile-card' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bio' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .bio',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'skill_section',
			[
				'label' => esc_html__( 'Skill', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'skill_color',
			[
				'label'     => esc_html__( 'Color', 'profile-card' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .skill' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'skill_typography',
				'selector' => '{{WRAPPER}} .skill',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .skill',
			]
		);
		$this->add_control(
			'skill_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'profile-card' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .skill' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'profile-card' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'btn_typography',
				'selector' => '{{WRAPPER}} .action-btn',
			]
		);
		$this->add_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'profile-card' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .action-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn-border',
				'selector' => '{{WRAPPER}} .action-btn',
			]
		);
		$this->add_control(
			'btn_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'profile-card' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .action-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_primary_tab',
			[
				'label' => esc_html__( 'Primary', 'profile-card' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'grad_primary_color',
				'types'    => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .action-btn.primary',
			]
		);

		$this->add_control(
            'btn_primary_color',
            [
                'label'     => esc_html__( 'Color', 'profile-card' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .action-btn.primary' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn-border-color',
				'selector' => '{{WRAPPER}} .action-btn.primary',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_sec_tab',
			[
				'label' => esc_html__( 'Secondary', 'profile-card' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'grad_secondary_color',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .action-btn.secondary',
			]
		);

		$this->add_control(
			'btn_secondary_color',
			[
				'label'     => esc_html__( 'Color', 'profile-card' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .action-btn.secondary' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn-border-secondary-color',
				'selector' => '{{WRAPPER}} .action-btn.secondary',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

        <div class="profile-card">
            <div class="card-content">
                <!-- Avatar Circle -->
                <div class="avatar-wrapper">
                    <div class="avatar">
                        <div class="avatar-glow"></div>
                        <div class="avatar-border"></div>
                        <img src="<?php echo esc_url( $settings['image']['url'] ); ?>"
                             alt="<?php esc_attr_e( 'profile image', 'profile-card' ); ?>">
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
                        <a href="<?php echo esc_url( $settings['button_url_1']['url'] ); ?>" class="action-btn primary">
                            <span><?php echo esc_html( $settings['button_text_1'] ); ?></span>
                            <div class="btn-effect"></div>
                        </a>
                        <a href="<?php echo esc_url( $settings['button_url_2']['url'] ); ?>"
                           class="action-btn secondary">
                            <span><?php echo esc_html( $settings['button_text_2'] ); ?></span>
                            <div class="btn-effect"></div>
                        </a>
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
