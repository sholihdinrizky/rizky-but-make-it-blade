import * as THREE from 'three';

/**
 * Career-matching network scene.
 * Central "profile" node surrounded by "job" nodes with connecting lines.
 */
export function initScene(container, sceneType = 'hero') {
    // Check WebGL support
    const canvas = document.createElement('canvas');
    const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
    if (!gl) return;

    // Check reduced motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const isDark = document.documentElement.classList.contains('dark');
    const isHeader = sceneType === 'header';
    const isSmallScreen = window.innerWidth < 768;

    // Scene setup
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, 1, 0.1, 100);
    camera.position.z = isHeader ? 4.5 : 5.5;

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        powerPreference: 'low-power',
    });
    renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
    renderer.setClearColor(0x000000, 0);

    // Hide SVG fallback
    const fallback = container.querySelector('.scene-fallback');
    if (fallback) fallback.style.display = 'none';

    container.appendChild(renderer.domElement);

    // Particle count based on device capabilities
    const nodeCount = isSmallScreen ? 10 : isHeader ? 12 : 20;

    // Color palette
    const colors = {
        center: isDark ? 0x27ab83 : 0x3ebd93,
        glow: isDark ? 0x199473 : 0x27ab83,
        nodes: isDark ? 0x829ab1 : 0x627d98,
        lines: isDark ? 0x334e68 : 0xbcccdc,
        highlight: isDark ? 0xffa726 : 0xff9800,
    };

    // Central node (icosahedron)
    const centerGeo = new THREE.IcosahedronGeometry(0.35, 1);
    const centerMat = new THREE.MeshBasicMaterial({
        color: colors.center,
        transparent: true,
        opacity: 0.9,
    });
    const centerMesh = new THREE.Mesh(centerGeo, centerMat);
    scene.add(centerMesh);

    // Glow ring
    const glowGeo = new THREE.RingGeometry(0.45, 0.55, 32);
    const glowMat = new THREE.MeshBasicMaterial({
        color: colors.glow,
        transparent: true,
        opacity: 0.15,
        side: THREE.DoubleSide,
    });
    const glowMesh = new THREE.Mesh(glowGeo, glowMat);
    scene.add(glowMesh);

    // Job nodes as points
    const nodePositions = [];
    const nodeSizes = [];
    const radius = isHeader ? 2.5 : 3.2;

    for (let i = 0; i < nodeCount; i++) {
        const phi = Math.acos(-1 + (2 * i) / nodeCount);
        const theta = Math.sqrt(nodeCount * Math.PI) * phi;
        const r = radius * (0.6 + Math.random() * 0.4);

        const x = r * Math.sin(phi) * Math.cos(theta);
        const y = r * Math.sin(phi) * Math.sin(theta);
        const z = r * Math.cos(phi) * 0.5;

        nodePositions.push(x, y, z);
        nodeSizes.push(3 + Math.random() * 5);
    }

    const pointsGeo = new THREE.BufferGeometry();
    pointsGeo.setAttribute('position', new THREE.Float32BufferAttribute(nodePositions, 3));
    pointsGeo.setAttribute('size', new THREE.Float32BufferAttribute(nodeSizes, 1));

    const pointsMat = new THREE.PointsMaterial({
        color: colors.nodes,
        size: 0.08,
        sizeAttenuation: true,
        transparent: true,
        opacity: 0.7,
    });
    const points = new THREE.Points(pointsGeo, pointsMat);
    scene.add(points);

    // Connecting lines from center to each node
    const linePositions = [];
    for (let i = 0; i < nodeCount; i++) {
        linePositions.push(0, 0, 0);
        linePositions.push(
            nodePositions[i * 3],
            nodePositions[i * 3 + 1],
            nodePositions[i * 3 + 2]
        );
    }

    const lineGeo = new THREE.BufferGeometry();
    lineGeo.setAttribute('position', new THREE.Float32BufferAttribute(linePositions, 3));
    const lineMat = new THREE.LineBasicMaterial({
        color: colors.lines,
        transparent: true,
        opacity: 0.25,
    });
    const lines = new THREE.LineSegments(lineGeo, lineMat);
    scene.add(lines);

    // A few highlighted "best match" nodes
    const highlightCount = Math.min(3, nodeCount);
    const highlightPositions = [];
    for (let i = 0; i < highlightCount; i++) {
        highlightPositions.push(
            nodePositions[i * 3],
            nodePositions[i * 3 + 1],
            nodePositions[i * 3 + 2]
        );
    }
    const hlGeo = new THREE.BufferGeometry();
    hlGeo.setAttribute('position', new THREE.Float32BufferAttribute(highlightPositions, 3));
    const hlMat = new THREE.PointsMaterial({
        color: colors.highlight,
        size: 0.12,
        sizeAttenuation: true,
        transparent: true,
        opacity: 0.9,
    });
    const hlPoints = new THREE.Points(hlGeo, hlMat);
    scene.add(hlPoints);

    // Mouse-driven parallax with lerp
    let mouseX = 0;
    let mouseY = 0;
    let targetX = 0;
    let targetY = 0;

    const onMouseMove = (e) => {
        targetX = (e.clientX / window.innerWidth - 0.5) * 0.4;
        targetY = (e.clientY / window.innerHeight - 0.5) * 0.4;
    };
    window.addEventListener('mousemove', onMouseMove, { passive: true });

    // Resize with ResizeObserver
    const resizeObserver = new ResizeObserver((entries) => {
        for (const entry of entries) {
            const { width, height } = entry.contentRect;
            if (width > 0 && height > 0) {
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
                renderer.setSize(width, height, false);
            }
        }
    });
    resizeObserver.observe(container);

    // Initial size
    const rect = container.getBoundingClientRect();
    if (rect.width > 0 && rect.height > 0) {
        camera.aspect = rect.width / rect.height;
        camera.updateProjectionMatrix();
        renderer.setSize(rect.width, rect.height, false);
    }

    // Visibility-based pause
    let isVisible = true;
    let animId = null;

    const visObserver = new IntersectionObserver(
        (entries) => {
            isVisible = entries[0].isIntersecting;
        },
        { threshold: 0 }
    );
    visObserver.observe(container);

    const onVisChange = () => {
        if (document.hidden) {
            isVisible = false;
        }
    };
    document.addEventListener('visibilitychange', onVisChange);

    // Render loop
    const clock = new THREE.Clock();

    function animate() {
        animId = requestAnimationFrame(animate);

        if (!isVisible) return;

        const elapsed = clock.getElapsedTime();

        // Lerp mouse parallax
        mouseX += (targetX - mouseX) * 0.03;
        mouseY += (targetY - mouseY) * 0.03;

        // Slow ambient rotation
        scene.rotation.y = elapsed * 0.08 + mouseX * 0.5;
        scene.rotation.x = mouseY * 0.3;

        // Pulse center glow
        glowMesh.scale.setScalar(1 + Math.sin(elapsed * 1.5) * 0.1);
        glowMat.opacity = 0.12 + Math.sin(elapsed * 1.5) * 0.04;

        // Subtle center pulse
        centerMesh.scale.setScalar(1 + Math.sin(elapsed * 2) * 0.03);

        renderer.render(scene, camera);
    }
    animate();

    // Cleanup on pagehide
    const cleanup = () => {
        if (animId) cancelAnimationFrame(animId);
        resizeObserver.disconnect();
        visObserver.disconnect();
        document.removeEventListener('visibilitychange', onVisChange);
        window.removeEventListener('mousemove', onMouseMove);

        centerGeo.dispose();
        centerMat.dispose();
        glowGeo.dispose();
        glowMat.dispose();
        pointsGeo.dispose();
        pointsMat.dispose();
        lineGeo.dispose();
        lineMat.dispose();
        hlGeo.dispose();
        hlMat.dispose();
        renderer.dispose();
    };

    window.addEventListener('pagehide', cleanup, { once: true });
}
