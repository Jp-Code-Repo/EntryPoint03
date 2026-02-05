import { useEffect, useRef, useState } from 'react'

function App() {
  const bufferRef = useRef('')
  const timeoutRef = useRef<number | null>(null)

  const [lastScan, setLastScan] = useState<string | null>(null)

  useEffect(() => {
    const handleKeyDown = (e: KeyboardEvent) => {
      // Ignore control keys
      if (e.key.length !== 1) return

      bufferRef.current += e.key

      // Reset timer on every character
      if (timeoutRef.current) {
        clearTimeout(timeoutRef.current)
      }

      timeoutRef.current = window.setTimeout(() => {
        if (bufferRef.current.length > 0) {
          setLastScan(bufferRef.current)
          bufferRef.current = ''
        }
      }, 300)
    }

    window.addEventListener('keydown', handleKeyDown)

    return () => {
      window.removeEventListener('keydown', handleKeyDown)
      if (timeoutRef.current) clearTimeout(timeoutRef.current)
    }
  }, [])

  return (
    <div
      style={{
        width: '100vw',
        height: '100vh',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        backgroundColor: '#0f0f0f',
        color: '#ffffff',
        fontFamily: 'system-ui, sans-serif',
      }}
    >
      <div style={{ textAlign: 'center' }}>
        <h1 style={{ marginBottom: '12px' }}>EntryPoint Scanner</h1>

        {!lastScan && (
          <p style={{ opacity: 0.7 }}>Waiting for scan…</p>
        )}

        {lastScan && (
          <>
            <p style={{ opacity: 0.7 }}>Scanned ID</p>
            <div
              style={{
                marginTop: '8px',
                fontSize: '24px',
                fontWeight: 600,
                letterSpacing: '1px',
              }}
            >
              {lastScan}
            </div>
          </>
        )}
      </div>
    </div>
  )
}

export default App
