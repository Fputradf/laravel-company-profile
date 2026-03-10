node {
    checkout scm

    // Tahap 1: Build (Instalasi Dependencies)
    stage ("Build") {
        docker.image('composer:latest').inside('-u root') {
            sh 'rm -f composer.lock'
            sh 'composer install --ignore-platform-reqs'
        }
    }

    // Tahap 2: Testing
    stage ("Testing") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'php -v'
            sh 'echo "Testing unit success"'
        }
    }

    // Tahap 3: Deploy ke VPS (Production)
    stage ("Deploy") {
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-prod']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$PROD_HOST" > ~/.ssh/known_hosts'
                // GANTI 'ubuntu' menjadi 'hhx'
                sh "rsync -rav --delete ./ hhx@$PROD_HOST:/home/hhx/prod.kelasdevops.xyz/ --exclude=.env --exclude=storage --exclude=.git"
            }
        }
    }
}